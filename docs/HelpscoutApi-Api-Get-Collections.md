[API Index](ApiIndex.md)


HelpscoutApi\Api\Get\Collections
---------------


**Class name**: Collections

**Namespace**: HelpscoutApi\Api\Get







    Deals with GET Collection API from helpscout.

    





Properties
----------


**$client**

GuzzleHttp\Client;



    private  $client






**$apiKey**

HelpscoutApi\Contracts\ApiKey;



    private  $apiKey






Methods
-------


public **__construct** (  $client,  $apiKey )











**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $client | GuzzleHttp\Client |  |
| $apiKey | [HelpscoutApi\Contracts\ApiKey](HelpscoutApi-Contracts-ApiKey.md) |  |

--

public **getAll** (  )


Get all collections








--

public **getCollectionById** ( Collection $collection )


Get a single collection based off the ID








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $collection | [Collection](HelpscoutApi-Contracts-Collection.md) |  |

--

public **getCollectionByNumber** ( Category $collection )


Get a single collection based off the number








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $collection | HelpscoutApi\Api\Get\Category |  |

--

[API Index](ApiIndex.md)
