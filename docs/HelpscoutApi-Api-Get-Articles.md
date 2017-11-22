[API Index](ApiIndex.md)


HelpscoutApi\Api\Get\Articles
---------------


**Class name**: Articles

**Namespace**: HelpscoutApi\Api\Get







    Gets all or a single article based on a category passed in.

    





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

public **getAll** ( CategoryValue $categoryValue )


Get all articles and return as JSON.

Uses the category to get the article information.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $categoryValue | HelpscoutApi\Api\Get\CategoryValue |  |

--

public **getSingle** ( CategoryValue $articleValue )


Get an article and return as JSON.

Gets the article based on the article information, such as id.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $articleValue | HelpscoutApi\Api\Get\CategoryValue |  |

--

[API Index](ApiIndex.md)
