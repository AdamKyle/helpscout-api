[API Index](ApiIndex.md)


HelpscoutApi\Params\Article
---------------


**Class name**: Article

**Namespace**: HelpscoutApi\Params


**Parent class**: [HelpscoutApi\Params\Base](HelpscoutApi-Params-Base.md)





    Article paramters for returning a list of articles

    





Properties
----------


**$params**

Array of params



    protected  $params = array()






Methods
-------


public **status** ( String $status )


Set the status

We accept `all`, `published` and `nopublished`

The default is `all`






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $status | String |  |

--

public **page** ( String $page )


Set the page number








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $page | String |  |

--

public **sort** ( String $sort )


Set the status

We accept `number`, `status`, `name`, `popularity`, `createdAt`
and `updatedAt`

The default is `number`






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $sort | String |  |

--

public **order** ( String $order )


Set the order of the returned results

We accept `asc` and `desc` with the default of `asc`






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $order | String |  |

--

public **pageSize** ( Integer $pageSize )


Set the page size.

The maximum is 100.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $pageSize | Integer |  |

--

public **getParams** (  )


Build the query for the params we can pass.

For example `?pageSize=20&amp;sort=number`






--

[API Index](ApiIndex.md)
