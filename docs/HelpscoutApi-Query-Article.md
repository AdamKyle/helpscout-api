[API Index](ApiIndex.md)


HelpscoutApi\Query\Article
---------------


**Class name**: Article

**Namespace**: HelpscoutApi\Query







    Used to build a query for the article search

    





Properties
----------


**$params**

The params for the article search



    protected  $params = array()






Methods
-------


public **__construct** (  )











--

public **createQuery** ( String $query )


Create a query

&lt;code&gt;?query=&#039;&#039;&lt;/code&gt; is string related to the article search.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $query | String |  |

--

public **setPage** ( String $page )


Sets the page for the url param

Takes in a string.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $page | String |  |

--

public **setCollectionId** ( Collection $collection )


Sets the collectionID for the url param








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $collection | [Collection](HelpscoutApi-Contracts-Collection.md) |  |

--

public **setSiteId** ( Site $site )


Sets the siteId for the url param








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $site | [Site](HelpscoutApi-Contracts-Site.md) |  |

--

public **setStatus** ( String $status )


Sets the status for the url param

Accepted statuses are: &lt;code&gt;all&lt;/code&gt;, &lt;code&gt;published&lt;/code&gt; and &lt;code&gt;notpublished&lt;/code&gt;

We default to &lt;code&gt;all&lt;/code&gt; if we don&#039;t match on anything.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $status | String |  |

--

public **setVisibility** ( String $visibility )


Sets the visibility for the url param

Accepted statuses are: &lt;code&gt;all&lt;/code&gt;, &lt;code&gt;public&lt;/code&gt; and &lt;code&gt;private&lt;/code&gt;

We default to &lt;code&gt;all&lt;/code&gt; if we don&#039;t match on anything.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $visibility | String |  |

--

public **getQuery** (  )


Builds and returns the query for the search endpoint








--

[API Index](ApiIndex.md)
