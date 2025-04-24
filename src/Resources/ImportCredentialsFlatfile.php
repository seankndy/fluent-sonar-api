<?php

namespace SeanKndy\SonarApi\Resources;

class ImportCredentialsFlatfile extends BaseResource
{
    /**
     * The type of entity to be imported.
     */
    public string $type;

    /**
     * A JSON Web Token.
     */
    public string $jwt;

}