[API Index](ApiIndex.md)


HelpscoutApi\Contracts\ArticlePostBody
---------------



    An Article interface for creating only the required fields.

    


**Interface name**: ArticlePostBody

**Namespace**: HelpscoutApi\Contracts

**This is an interface**







Methods
-------


public **collectionID** ( String $collectionId )


Set the collection ID the aerticle belongs to.








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $collectionId | String |  |

--

public **name** ( String $name )


Set the name of the aerticle.








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $name | String |  |

--

public **text** ( String $text )


Set the text of the aerticle.








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $text | String |  |

--

public **createPostBody** (  )


Create the JSON aspect of the post body.

```php
{
  collectionId: &#039;xxxx&#039;,
  name: &#039;sample&#039;,
  text: &#039;Some text here ...&#039;,
}
````






--

[API Index](ApiIndex.md)
