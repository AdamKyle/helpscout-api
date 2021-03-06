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

public **getAllFromCategory** ( CategoryValue $categoryValue, Article $articleParams )


Get all articles from a category and return as JSON.

Uses the category to get the article information.

You can pass in an optional ArticleParams object in which you set
the order in which the articles are sorted by.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $categoryValue | HelpscoutApi\Api\Get\CategoryValue |  |
| $articleParams | [Article](HelpscoutApi-Params-Article.md) | &lt;ul&gt;
&lt;li&gt;Optional&lt;/li&gt;
&lt;/ul&gt; |

--

public **getAllFromCollection** ( Collection $collection, Article $articleParams )


Get all articles from a collection and return as JSON.

Uses the collection to get the article information.

You can pass in an optional ArticleParams object in which you set
the order in which the articles are sorted by.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $collection | [Collection](HelpscoutApi-Contracts-Collection.md) |  |
| $articleParams | [Article](HelpscoutApi-Params-Article.md) | &lt;ul&gt;
&lt;li&gt;Optional&lt;/li&gt;
&lt;/ul&gt; |

--

public **collectionGetRequest** ( Collection $collection, Article $articleParams )


Create a Collection Get Request.

This works the same was as a `getAllFromCollection` function, instead
of returning a JSON repersentation, we return a Request object that you
would then use the the Pool class.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $collection | [Collection](HelpscoutApi-Contracts-Collection.md) |  |
| $articleParams | [Article](HelpscoutApi-Params-Article.md) |  |

--

public **getSingle** ( Article $articleValue, Boolean $draft )


Get an article and return as JSON.

Gets the article based on the article information, such as id.

Optional param is draft, which gets back or allows you to get back a draft
article.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $articleValue | [Article](HelpscoutApi-Contracts-Article.md) |  |
| $draft | Boolean | &lt;ul&gt;
&lt;li&gt;optional&lt;/li&gt;
&lt;/ul&gt; |

--

public **getSingleRequest** ( Article $articleValue, Boolean $draft )


Simmilar to getSingle, returns a request object instead.








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $articleValue | [Article](HelpscoutApi-Contracts-Article.md) |  |
| $draft | Boolean | &lt;ul&gt;
&lt;li&gt;optional&lt;/li&gt;
&lt;/ul&gt; |

--

public **getSingleAsync** ( Request $request )


Uses sendAsync to send a psr7 request.








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $request | GuzzleHttp\Psr7\Request |  |

--

public **getRelatedArticles** ( CategoryValue $articleValue, Article $articleParams )


Get all related articles for a specific article

Gets all related articles based on the article information, such as id.

We also allow you to pass in an optional ArticleParams which allows you to set the
params of the url to be passed in.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $articleValue | HelpscoutApi\Api\Get\CategoryValue |  |
| $articleParams | [Article](HelpscoutApi-Params-Article.md) | &lt;ul&gt;
&lt;li&gt;Optional&lt;/li&gt;
&lt;/ul&gt; |

--

public **searchArticles** ( Article $articleQuery )


Search the articles based on an article query

The article query is a string which is built from seting values
and then using the `getQuery` to get the query for the
endpoint.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $articleQuery | [Article](HelpscoutApi-Query-Article.md) |  |

--

public **getRevisions** ( Article $article, String $page )


Get all article revisions

You can pass in an optinal param called page which sets the page of revisions to
get back.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $article | [Article](HelpscoutApi-Contracts-Article.md) |  |
| $page | String |  |

--

public **getRevision** ( Revision $article )


Get an article revision








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $article | HelpscoutApi\Contracts\Revision |  |

--

[API Index](ApiIndex.md)
