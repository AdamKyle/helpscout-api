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

public **getAllFromCollection** ( CategoryValue $collection, Article $articleParams )


Get all articles from a collection and return as JSON.

Uses the collection to get the article information.

You can pass in an optional ArticleParams object in which you set
the order in which the articles are sorted by.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $collection | HelpscoutApi\Api\Get\CategoryValue |  |
| $articleParams | [Article](HelpscoutApi-Params-Article.md) | &lt;ul&gt;
&lt;li&gt;Optional&lt;/li&gt;
&lt;/ul&gt; |

--

public **getSingle** ( Boolean $articleValue, CategoryValue $draft )


Get an article and return as JSON.

Gets the article based on the article information, such as id.

Optional param is draft, which gets back or allows you to get back a draft
article.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $articleValue | Boolean | &lt;ul&gt;
&lt;li&gt;optional&lt;/li&gt;
&lt;/ul&gt; |
| $draft | HelpscoutApi\Api\Get\CategoryValue |  |

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
