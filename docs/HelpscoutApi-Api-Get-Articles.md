[API Index](ApiIndex.md)


HelpscoutApi\Api\Get\Articles
---------------


**Class name**: Articles

**Namespace**: HelpscoutApi\Api\Get







    Deals with GET Articles API from helpscout.

    





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

public **getRelatedArticles** ( CategoryValue $articleValue )


Get all related articles for a specific article

Gets all related articles based on the article information, such as id.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $articleValue | HelpscoutApi\Api\Get\CategoryValue |  |

--

public **searchArticles** ( Article $articleQuery )


Search the articles based on an article query

The article query is a string which is built from seting values
and then using the &lt;code&gt;getQuery&lt;/code&gt; to get the query for the
endpoint.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $articleQuery | [Article](HelpscoutApi-Query-Article.md) |  |

--

public **getRevisions** ( Article $article )


Get all article revisions








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $article | [Article](HelpscoutApi-Contracts-Article.md) |  |

--

public **getRevision** ( Revision $article )


Get an article revision








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $article | HelpscoutApi\Contracts\Revision |  |

--

[API Index](ApiIndex.md)
