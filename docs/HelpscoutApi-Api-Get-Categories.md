[API Index](ApiIndex.md)


HelpscoutApi\Api\Get\Categories
---------------


**Class name**: Categories

**Namespace**: HelpscoutApi\Api\Get







    Deals with GET Category API from helpscout.

    





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

public **getAll** ( Collection $collection )


Get all collections.








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $collection | [Collection](HelpscoutApi-Contracts-Collection.md) |  |

--

[API Index](ApiIndex.md)
