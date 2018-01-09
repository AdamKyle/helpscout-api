[API Index](ApiIndex.md)


HelpscoutApi\Api\Delete\Collection
---------------


**Class name**: Collection

**Namespace**: HelpscoutApi\Api\Delete







    Deals with Deleteing Collections API from helpscout.

    





Properties
----------


**$client**

GuzzleHttp\Client



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

public **delete** ( Collection $collection )


Delete an article based on the category id.








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $collection | HelpscoutApi\Api\Delete\HelpscoutApi\Contracts\Collection |  |

--

[API Index](ApiIndex.md)
