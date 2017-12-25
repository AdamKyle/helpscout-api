[API Index](ApiIndex.md)


HelpscoutApi\Api\Delete\Article
---------------


**Class name**: Article

**Namespace**: HelpscoutApi\Api\Delete







    Deals with Deleteing Articles API from helpscout.

    





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

public **delete** ( Article $article )


Delete an article based on the article id.








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $article | HelpscoutApi\Api\Delete\HelpscoutApi\Contracts\Article |  |

--

[API Index](ApiIndex.md)
