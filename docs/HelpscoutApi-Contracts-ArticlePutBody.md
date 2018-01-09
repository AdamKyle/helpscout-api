[API Index](ApiIndex.md)


HelpscoutApi\Contracts\ArticlePutBody
---------------



    An Article interface for creating only the required fields.

    


**Interface name**: ArticlePutBody

**Namespace**: HelpscoutApi\Contracts

**This is an interface**







Methods
-------


public **id** ( string $articleId )


Set the article id.








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $articleId | string |  |

--

public **getId** (  )


Returns the article id.








--

public **articlePostBody** ( ArticlePostBody $articlePostBody )


Sets the article post body.








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $articlePostBody | [ArticlePostBody](HelpscoutApi-Contracts-ArticlePostBody.md) |  |

--

public **createPutBody** (  )


Create the JSON aspect of the put body.

```php
{
  collectionId: &#039;xxxx&#039;,
  name: &#039;sample&#039;,
  text: &#039;Some text here ...&#039;,
}
````






--

[API Index](ApiIndex.md)
