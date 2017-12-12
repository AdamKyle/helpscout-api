[API Index](ApiIndex.md)


HelpscoutApi\Api\Post\Category
---------------


**Class name**: Category

**Namespace**: HelpscoutApi\Api\Post







    Allows you to post an category to Helpscout using the API.

    





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

public **create** ( CategoryPostBody $categoryPostBody )


Post an category to the Helpscout API.








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $categoryPostBody | [CategoryPostBody](HelpscoutApi-Contracts-CategoryPostBody.md) |  |

--

[API Index](ApiIndex.md)
