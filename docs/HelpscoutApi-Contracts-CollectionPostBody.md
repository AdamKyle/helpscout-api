[API Index](ApiIndex.md)


HelpscoutApi\Contracts\CollectionPostBody
---------------



    An collection interface for creating only the required fields.

    


**Interface name**: CollectionPostBody

**Namespace**: HelpscoutApi\Contracts

**This is an interface**







Methods
-------


public **siteId** ( Site $site )


Set the site ID the collection belongs to.








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $site | [Site](HelpscoutApi-Contracts-Site.md) |  |

--

public **name** ( String $name )


Set the name of the collection








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $name | String |  |

--

public **createPostBody** (  )


Create the JSON aspect of the post body.

```php
{
  siteId: &#039;xxxx&#039;,
  name: &#039;sample&#039;,
}
````






--

[API Index](ApiIndex.md)
