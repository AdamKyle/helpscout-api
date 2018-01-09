[API Index](ApiIndex.md)


HelpscoutApi\Api\Put\Article
---------------


**Class name**: Article

**Namespace**: HelpscoutApi\Api\Put







    Allows you to put an article to Helpscout using the API.

    





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

public **update** ( ArticlePostBody $articlePutBody )


PUT an article to the Helpscout API.








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $articlePutBody | HelpscoutApi\Api\Put\ArticlePostBody |  |

--

public **updateAsync** ( ArticlePutBody $articlePutBody )


PUT the article in an asynchronous way.

Same method signature and options as `update`.

This is great for when you need to put a set of articles that do not
got over the rate limit.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $articlePutBody | [ArticlePutBody](HelpscoutApi-Contracts-ArticlePutBody.md) |  |

--

public **updateRequest** ( ArticlePutBody $articlePutBody )


Returns a new request object

This is good for creating pools of requests. This is when you
don&#039;t know how many requests you need to create and thus might go over
the rate limit.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $articlePutBody | [ArticlePutBody](HelpscoutApi-Contracts-ArticlePutBody.md) |  |

--

[API Index](ApiIndex.md)
