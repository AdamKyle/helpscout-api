[API Index](ApiIndex.md)


HelpscoutApi\Contracts\CategoryPostBody
---------------



    An Category interface for creating only the required fields.

    


**Interface name**: CategoryPostBody

**Namespace**: HelpscoutApi\Contracts

**This is an interface**







Methods
-------


public **collectionId** ( Collection $collection )


Set the collection ID the category belongs to.








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $collection | [Collection](HelpscoutApi-Contracts-Collection.md) |  |

--

public **name** ( String $name )


Set the name of the category








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $name | String |  |

--

public **createPostBody** (  )


Create the JSON aspect of the post body.

```php
{
  collectionId: &#039;xxxx&#039;,
  name: &#039;sample&#039;,
}
````






--

[API Index](ApiIndex.md)
