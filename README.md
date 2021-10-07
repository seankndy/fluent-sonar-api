# fluent-sonar-api

This is a Sonar Software (https://sonar.software) v2 GraphQL PHP API client with a fluent interface.  It aims to make your common fetch queries and mutations simple and somewhat Laravel Eloquent-like.


# Queries

Queries are done by calling the top level object name as a method and then chaining your filters, sorts, and relations to load.  Basic Accounts example:

```
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

```
<?php
$accounts = $client
    ->accounts()
    ->with([
	    'tickets' => fn($query) => $query->sortBy('createdAt', 'ASC),
    ])
    ->where('id', 1234)
    ->get();
```

In the above example, tickets will be sorted ascending by the `created_at` field.

The following top level objects are supported by `Client` out of the box:

```
   companies()
   accounts()
   tickets()
   contacts()
   jobs()
   jobTypes()
   services()
   users()
```

You may extend and/or override these by passing a fourth argument to `Client`'s constructor:

```
<?php

namespace App;

use SeanKndy\SonarApi\Client;
use GuzzleHttp\Client as GuzzleClient;
use App\Support\SonarApi\Resources\Invoice;

$client = new Client(
    new GuzzleClient(),
    '<your api key>',
    'https://your-sonar-instance.sonar.software',
    [
        'invoices' => Invoice::class,
    ],
);
```

# Pagination

Pagination is supported via Laravel/Illuminate's `LengthAwarePaginator`:

```
<?php
$accounts = $client
    ->accounts()
    ->sortBy('createdAt', 'DESC')
    ->paginate(25, 1, 'http://site.com/some/path'); // 25 per page, 1st page, base url for links
```

# Creating Resource Objects

Here is an example of how you can create your own resource objects (note that the Company object is already included in the library):

```
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

Mutations are mapped to PHP objects just like queried resources are.  There are tons of mutations so you will probably have to write your own mutation class, but its straightforward.  Here is an example of running a mutation using one of the built in mutations provided by the library:

```
<?php
use SeanKndy\SonarApi\Client;
use GuzzleHttp\Client as GuzzleClient;

$client = new Client(
    new GuzzleClient(),
    '<your api key>',
    'https://your-sonar-instance.sonar.software'
);

$ticket = $client
    ->mutations()
    ->run(new CreatePublicTicket(
        new CreatePublicTicketMutationInput([
            'subject' => 'A ticket subject',
            'description' => 'A ticket description.',
            'status' => 'OPEN',
            'priority' => 'HIGH',
            'ticketableId' => 12345,
            'ticketableType' => 'Account',
            'inboundMailboxId' => 1,
        ])
    ));
 
// $ticket will be an instance of newly created \SeanKndy\SonarApi\Resources\Ticket object
```
Mutation classes implement the `\SeanKndy\SonarApi\Mutations\MutationInterface` interface.  You may instead just extend `\SeanKndy\SonarApi\Mutations\BaseMutation` which implements `MutationInterface` and builds the GraphQL mutation query and variables for you based on the your classes name, public properties and a `returnResource()` method you must implement.  Here is an example of extending `BaseMutation`:

```
<?php

namespace App\Support\SonarApi\Mutations;

use SeanKndy\SonarApi\Mutations\BaseMutation;
use App\Support\SonarApi\Mutations\Inputs\UpdateTicketMutationInput;

//
// Because class is named UpdateTicket the mutation method run in GraphQL will be
// updateTicket() by default, but you can override `name()` to change that.
//
class UpdateTicket extends BaseMutation
{
    public Int64Bit $id;  
  
    public UpdateTicketMutationInput $input;  
  
    public function __construct(Int64Bit $id, UpdateTicketMutationInput $input)  
    {  
        $this->id = $id;  
        $this->input = $input;  
    }  
    
    public function returnResource(): ?string  
    {
        // the resource to return from the mutation
        return Ticket::class;  
    }
}
```

Sonar has many MutationInput objects which are basically DTOs and such as the 	`UpdateTicketMutationInput` referenced above.   These can be created easily by extending `SeanKndy\SonarApi\Mutations\Inputs\BaseInput`:

```
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

```
$updateTicketMutationInput = new UpdateTicketMutationInput(['subject' => 'new subject']);
```

or

```
$updateTicketMutationInput = new UpdateTicketMutationInput();
$updateTicketMutationInput->subject = 'new subject';
```

`BaseInput` uses PHP's `__set()` method to set the protected property on your behalf here and also keep track of which properties have been set so it knows which to include in the mutation sent to Sonar.  If it didn't do this then it would send all the fields in the mutation and update fields that you never wanted updated to null/empty values.
