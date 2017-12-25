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

public **createAsync** ( CategoryPostBody $categoryPostBody )


Create the category in an asynchronous way.

Same method signature and options as `create`.

This is great for when you need to create a set of categories that do not
got over the rate limit.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $categoryPostBody | [CategoryPostBody](HelpscoutApi-Contracts-CategoryPostBody.md) |  |

--

public **createRequest** ( CategoryPostBody $categoryPostBody )


Returns a new request object

This is good for creating pools of requests. This is when you
don&#039;t know how many requests you need to create and thus might go over
the rate limit.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $categoryPostBody | [CategoryPostBody](HelpscoutApi-Contracts-CategoryPostBody.md) |  |

--

[API Index](ApiIndex.md)
