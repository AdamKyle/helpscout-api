[API Index](ApiIndex.md)


HelpscoutApi\Api\Get\Categories
---------------


**Class name**: Categories

**Namespace**: HelpscoutApi\Api\Get







    Deals with GET Category API from helpscout.

    





Properties
----------


**$client**

GuzzleHttp\Client;



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

public **getAll** ( Collection $collection,  $categoryParams )


Get all collections by id.








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $collection | [Collection](HelpscoutApi-Contracts-Collection.md) |  |
| $categoryParams | [HelpscoutApi\Params\Category](HelpscoutApi-Params-Category.md) |  |

--

public **getCategoryById** ( Category $category )


Get a single category based off the ID








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $category | [Category](HelpscoutApi-Contracts-Category.md) |  |

--

public **getCategoryByNumber** ( Category $category )


Get a single category based off the number








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $category | [Category](HelpscoutApi-Contracts-Category.md) |  |

--

public **getAllFromCollection** ( CollectionValue $collection, Category $categoryParams )


Get all categories from a collection and return as JSON.

Uses the collection to get the category information.

You can pass in an optional Categoryparams object in which you set
the order in which the categories are sorted by.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $collection | HelpscoutApi\Api\Get\CollectionValue |  |
| $categoryParams | [Category](HelpscoutApi-Params-Category.md) | &lt;ul&gt;
&lt;li&gt;Optional&lt;/li&gt;
&lt;/ul&gt; |

--

public **collectionGetRequest** ( Collection $collection, Category $categoryParams )


Create a Collection Get Request.

Creates a request object for getting categories with multiple
pages or to get multiple categories in general.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $collection | [Collection](HelpscoutApi-Contracts-Collection.md) |  |
| $categoryParams | [Category](HelpscoutApi-Params-Category.md) |  |

--

[API Index](ApiIndex.md)
