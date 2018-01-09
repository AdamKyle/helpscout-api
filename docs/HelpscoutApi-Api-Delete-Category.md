[API Index](ApiIndex.md)


HelpscoutApi\Api\Delete\Category
---------------


**Class name**: Category

**Namespace**: HelpscoutApi\Api\Delete







    Deals with Deleteing Categories API from helpscout.

    





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

public **delete** ( Category $category )


Delete an article based on the category id.








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $category | HelpscoutApi\Api\Delete\HelpscoutApi\Contracts\Category |  |

--

[API Index](ApiIndex.md)
