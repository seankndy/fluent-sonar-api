# fluent-sonar-api

This is a Sonar Software (https://sonar.software) v2 GraphQL PHP API client with a fluent interface.  It aims to make your common fetch queries and mutations simple and somewhat Laravel Eloquent-like.

The key benefits of using this library is the fluent interface for a nice DX and the returned resources are real PHP objects allowing static analyzers to assist in preventing bugs and your IDE can do code completions.

# Installation

You can install the package via composer:

```
composer require seankndy/fluent-sonar-api
```

# Queries

Queries are done by calling the top level object name as a method and then chaining your filters, sorts, and relations to load.  The method name should be in camel-case and plural, for example to query network sites then the method name would be `networkSites()`.  Basic Accounts example:

```php
<?php
use SeanKndy\SonarApi\Client;
use GuzzleHttp\Client as GuzzleClient;

$client = new Client(
    new GuzzleClient(),
    '<your api key>',
    'https://your-sonar-instance.sonar.software'
);

$accounts = $client
    ->accounts()
    ->with('accountStatus', 'tickets', 'company')
    ->where('id', 1234)
    ->get();
 
// $accounts is an Illuminate Collection of \SeanKndy\SonarApi\Resources\Account objects
```

Objects returned from Sonar's API need to be mapped to real PHP objects that the library refers to as Resources.  Several core Sonar objects are included in this library in the `\SeanKndy\SonarApi\Resources`  namespace and you may [create your own](#creating-resource-objects) object resources by extending `\SeanKndy\SonarApi\Resources\BaseResource`.

Relations are not queried by default and you must use the `with()` method to state which relations you want to load (as done above).  If you want to filter or sort the related resources you can do so with a closure:

```php
<?php
$accounts = $client
    ->accounts()
    ->with([
        'tickets' => fn($query) => $query->sortBy('createdAt', 'ASC'),
    ])
    ->where('id', 1234)
    ->get();
```

In the above example, tickets will be sorted ascending by the `created_at` field.

If you want to supply your own resource class, you can do so by passing a fourth argument to `Client`'s constructor:

```php
<?php

namespace App;

use SeanKndy\SonarApi\Client;
use GuzzleHttp\Client as GuzzleClient;
use App\Support\SonarApi\Resources\InventoryItem;

$client = new Client(
    new GuzzleClient(),
    '<your api key>',
    'https://your-sonar-instance.sonar.software',
    [
        'inventoryItems' => InventoryItem::class,
    ],
);
```

Now when calling `inventoryItems()` on the `Client` object a query builder using `App\Support\SonarApi\Resources\InventoryItem` will be used instead of the built-in InventoryItem class.



## where() and whereHas()

When writing queries you can filter them using the where methods.  `where()` and `orWhere()` create Sonar search filter objects.  There are limitations to grouping search logic due to how the search filters work in Sonar's API.  It is probably simplest to just show various call structures supported and the resulting search logic they produce:

```php
$client->someObjects()
    ->where('field1', 'foo')
    ->where('field2', '!=', 'bar');
// logic:  (field1 = 'foo' AND field2 != 'bar')

$client->someObjects()
    ->where('field1', 'foo')
    ->where('field2', '!=', 'bar')
    ->orWhere('field3', 'baz');
// logic:  (field1 = 'foo' AND field2 != 'bar') OR field3 = 'baz'

$client->someObjects()
    ->where('field1', 'foo')
    ->where('field2', '!=', 'bar')
    ->orWhere('field3', 'baz')
    ->where('field4', 'qux')
// logic:  (field1 = 'foo' AND field2 != 'bar') OR (field3 = 'baz' AND field4 = 'qux')

$client->someObjects()
    ->where('field1', 'foo')
    ->where('field2', '!=', 'bar')
    ->orWhere('field3', 'baz')
    ->where('field4', ['qux', 'quux'])
// logic: INVALID, cannot call where() on array of values (which is an ORed search) after an orWhere()

$client->someObjects()
    ->where('field1', ['foo', 'bar'])
    ->where('field2', ['baz', 'qux'])
// logic:  (field1 = 'foo' OR field1 = 'bar') AND (field2 = 'baz' OR field2 = 'qux')
```

`where()` and `orWhere()` have the same arguments: field, operator, search_value.  You can pass only 2 arguments and it is assumed the second argument is the search_value and the operator is '='.

`whereHas()`, `orWhereHas()`, `whereNotHas()` and `orWhereNotHas()` are also supported and these produce Sonar's ReverseRelationFilters.  They filter the current object based on the xfiltering of a related object.  Example showing a way to get only accounts that have related Addresses with a city of Chicago:

```php
$client
    ->accounts()
    ->whereHas('addresses', fn($search) => $search->where('city', 'Chicago'))
    ->get()
```

The second argument passed to `whereHas()` is a closure that receives a `\SeanKndy\SonarApi\Queries\Search\Search` object which is a where()-able object to build searches.

The second argument is optional and if not passed then the filter will be for the presence of any objects on the relation.

`orWhereHas()` allows you to specify an ORed relation filter.  For example, let's get any account that has an address in Chicago OR the account has any invoices present at all:

```php
$client
    ->accounts()
    ->whereHas('addresses', fn($search) => $search->where('city', 'Chicago'))
    ->orWhereHas('invoices')
    ->get()
```

Lastly, you can use `whereNotHas()` and `orWhereNotHas()` to filter on the absence of a relation such as if you wanted to get all accounts that have NO tickets:

```php
$client
    ->accounts()
    ->whereNotHas('tickets')
    ->get()
```

These not-has methods do not support a second search closure argument.

Not that any of the where-has type methods do not require that the relation be loaded by `with()` for them to be effective.

# Pagination

Pagination is supported via Laravel/Illuminate's `LengthAwarePaginator`:

```php
<?php
$accounts = $client
    ->accounts()
    ->sortBy('createdAt', 'DESC')
    ->paginate(25, 1, 'http://site.com/some/path'); // 25 per page, 1st page, base url for links
```

The underlying pagination is done on Sonar's side using Sonar's `Paginator` in GraphQL.

# Creating Resource Objects

Here is an example of how you can create your own resource objects (note that the Company object is already included in the library):

```php
<?php

namespace App\Support\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\BaseResource;

class Company extends BaseResource
{
    public int $id;  
    public string $name;  
    public string $checksPayableTo;  
    public string $country;  
    public string $phoneNumber;  
    public string $primaryColor;  
    public string $secondaryColor;  
    public ?string $customerPortalUrl;  
    public bool $default;  
    public bool $enabled;  
    public bool $showRemittanceSlip;  
    public ?string $websiteAddress;
    public ?string $taxIdentification;
    public \DateTime $createdAt;
    public \DateTime $updatedAt; 
    /**
     * @var \SeanKndy\SonarApi\Resources\Account[]
     * /
    public array $accounts;
}
```

All properties must be public and type hinted.   Sonar uses snake-casing on all fields and so camel-cased properties and relations are automatically converted to snake-case.

A has-one relationship should be specified with the resource object such as `public AccountStatus $accountStatus;` where `AccountStatus` is another resource.  If there is a has-many relation then you type hint using a phpdoc `@var` statement above the property declaration as in the `$accounts` property above.  Note that you *must* type hint with the full namespace path when doing `@var` hints.

# Mutations

Mutations are executed using the MutationQueryBuilder which is returned by calling `mutations()` on the client object.  Simply pass in the variables/argument as an associative array to the mutation name method call.  Variables that are required should have an exclamation (!) after the variable name like `id!` in the below example. 

There are two ways to build typed input data:

 1) Entirely in-line using arrays and closures
 2) Write mutation input classes that extend `SeanKndy\SonarApi\Mutations\Inputs\BaseInput`.
 
Here is an example of using the in-line approach for the type-based input `input`:

```php
<?php
use SeanKndy\SonarApi\Client;
use SeanKndy\SonarApi\Resources\Ticket;
use SeanKndy\SonarApi\Mutations\Inputs\InputBuilder;
use SeanKndy\SonarApi\Types\Int64Bit;
use GuzzleHttp\Client as GuzzleClient;

$client = new Client(
    new GuzzleClient(),
    '<your api key>',
    'https://your-sonar-instance.sonar.software'
);

$ticket = $client
    ->mutations()
    ->updateTicket([
        'id!' => Int64Bit(12345),
        'input' => fn(InputBuilder $input) => $input->type('UpdateTicketMutationInput')->data([
            'subject' => 'An updated ticket subject',
        ])
    ])
    ->return(Ticket::class)
    ->run()
 
// $ticket will be an instance of newly created \SeanKndy\SonarApi\Resources\Ticket object
```


Here is an example of the same mutation, but using a class-based approach to the input:

```php
<?php
use SeanKndy\SonarApi\Client;
use SeanKndy\SonarApi\Resources\Ticket;
use SeanKndy\SonarApi\Types\Int64Bit;
use SeanKndy\SonarApi\Mutations\Inputs\UpdateTicketMutationInput;
use GuzzleHttp\Client as GuzzleClient;

$client = new Client(
    new GuzzleClient(),
    '<your api key>',
    'https://your-sonar-instance.sonar.software'
);

$ticket = $client
    ->mutations()
    ->updateTicket([
        'id!' => Int64Bit(12345),
        'input' => new UpdateTicketMutationInput([
            'subject' => 'An updated ticket subject',
        ])
    ])
    ->return(Ticket::class)
    ->run()
 
// $ticket will be an instance of newly created \SeanKndy\SonarApi\Resources\Ticket object
```

The `return()` method indicates what resource should be returned by the mutation.  Again, view Sonar's documentation to view each mutation's return type.

You may have noticed that `id` is an instance of `\SeanKndy\SonarApi\Types\Int64Bit`.  This is a wrapper type object which mocks the data type within Sonar's GraphQL schema and is required for this mutation.  See Sonar's API documentation (https://api.sonar.software) to view any mutation's specifications.

The class-based approach has the benefit of throwing exceptions if the field doesn't exist or the field value given does not match the type specified.  These can be created easily by extending `SeanKndy\SonarApi\Mutations\Inputs\BaseInput`:

```php
<?php
  
namespace App\Support\SonarApi\Mutations\Inputs;

use SeanKndy\SonarApi\Mutations\Inputs\BaseInput;
  
class UpdateTicketMutationInput extends BaseInput  
{  
    protected string $subject;
    protected string $description;  
    protected string $status; 
    protected string $priority;
    protected int $ticketParentId;
    protected bool $unsetTicketGroupId;  
}
```

Notice that the properties are all `protected` not `public`.  This is a requirement and if you extend `BaseInput` and declare public properties an exception will be thrown upon object instantiation.  The reason they're protected is because `BaseInput` controls setting the values of each property so it knows which properties to actually include in the mutation.  For example, say you want to update the ticket's `subject` field and nothing else.  You can do this by either:

```php
$updateTicketMutationInput = new UpdateTicketMutationInput(['subject' => 'new subject']);
```

or

```
$updateTicketMutationInput = new UpdateTicketMutationInput();
$updateTicketMutationInput->subject = 'new subject';
```

`BaseInput` uses PHP's `__set()` method to set the protected property on your behalf here and also keep track of which properties have been set so it knows which to include in the mutation sent to Sonar.  If it didn't do this then it would send all the fields in the mutation and update fields that you never wanted updated to null/empty values.

### Arrays of Types

If you need to specify an array of types, you can do the following:

```php
<?php
use SeanKndy\SonarApi\Client;
use SeanKndy\SonarApi\Resources\SuccessResponse;
use SeanKndy\SonarApi\Types\Int64Bit;
use SeanKndy\SonarApi\Mutations\Inputs\InputBuilder;
use GuzzleHttp\Client as GuzzleClient;

$client = new Client(
    new GuzzleClient(),
    '<your api key>',
    'https://your-sonar-instance.sonar.software'
);

// 
// inline approach
//
$successResponse = $client
    ->mutations()
    ->createDataUsages([
        // notice the type name wrapped in brackets [] below
        'input' => fn(InputBuilder $input) => $input->type('[CreateDataUsageMutationInput]')->data([
            [
                'accountId' => net Int64Bit(12345),
                'dataSourceIdentifier' => 'usage-collector1',
                // etc
            ],
            // ...
        ])
    ])
    ->return(SuccessResponse::class)
    ->run()

// 
// class-based input approach
//
$successResponse = $client
    ->mutations()
    ->createDataUsages([
        'input' => [
            new CreateDataUsageMutationInput([
                'accountId' => net Int64Bit(12345),
                'dataSourceIdentifier' => 'usage-collector1',
                // etc
            ]),
            new CreateDataUsageMutationInput([
                //...
            ]),
            // ...
        ],
    ])
    ->return(SuccessResponse::class)
    ->run()
```

### `SuccessResponse`'s

In the last example above we used a `SeanKndy\SonarApi\Resources\SuccessResponse` for the mutation return resource.  You'll see this response type on several mutations in Sonar that they use when there is no other appropriate response.  This is just to make you aware that this resource type is built-in for your use.

# File Operations

File operations in Sonar (upload and download) are supported.  Example of working with a file contained in Sonar:

```php
<?php
use SeanKndy\SonarApi\Client;
use GuzzleHttp\Client as GuzzleClient;

$client = new Client(
    new GuzzleClient(),
    '<your api key>',
    'https://your-sonar-instance.sonar.software'
);

// get the first \SeanKndy\SonarApi\Resources\File resource associated to Account 1234
$file = $client
    ->files()
    ->where('fileableId', 1234)
    ->where('fileableType', 'Account')
    ->first();

// $file is just an API resource object.  now let's get a stream to the actual file data.
$fileStream = $client->fileStream($file);
    
// $fileStream is now a stream resource
```

Example of uploading a file to Sonar:

```php
<?php
use SeanKndy\SonarApi\Client;
use GuzzleHttp\Client as GuzzleClient;

$client = new Client(
    new GuzzleClient(),
    '<your api key>',
    'https://your-sonar-instance.sonar.software'
);

// get Account 1234 -- we'll upload the file and associate it to this resource.
$account = $client
    ->accounts()
    ->where('id', 1234)
    ->first();

// upload file, associate it to $account
$client
    ->uploadFile(
        '/path/to/file', // path or resource to file to upload
        'testing.txt' // name to give file in Sonar
    )->associateResource($account);
```