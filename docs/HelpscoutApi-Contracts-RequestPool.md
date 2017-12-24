[API Index](ApiIndex.md)


HelpscoutApi\Contracts\RequestPool
---------------



    For storing Request Pools

    Request pool pushes a Request object to an array of requests.
these are then used in the Guzzel Pool, to resolve over a set period of
time.


**Interface name**: RequestPool

**Namespace**: HelpscoutApi\Contracts

**This is an interface**







Methods
-------


public **pushRequest** ( Request $request )


Push a request to the array of requests.








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $request | HelpscoutApi\Contracts\GuzzleHttp\Psr7\Request |  |

--

public **getRequests** (  )


Get all the requests.








--

public **setConcurrency** ( integer $concurrency )


Set the concurrency.

How many to do before we wait for them to complete.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $concurrency | integer |  |

--

public **getConcurrency** (  )


Get the concurrency.

How many to do before we wait for them to complete.






--

[API Index](ApiIndex.md)
