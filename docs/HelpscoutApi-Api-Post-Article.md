[API Index](ApiIndex.md)


HelpscoutApi\Api\Post\Article
---------------


**Class name**: Article

**Namespace**: HelpscoutApi\Api\Post







    Allows you to post an article to Helpscout using the API.

    





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

public **create** ( ArticlePostBody $articlePostBody )


Post an article to the Helpscout API.








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $articlePostBody | [ArticlePostBody](HelpscoutApi-Contracts-ArticlePostBody.md) |  |

--

[API Index](ApiIndex.md)
