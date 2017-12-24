[API Index](ApiIndex.md)


HelpscoutApi\Api\Pool
---------------


**Class name**: Pool

**Namespace**: HelpscoutApi\Api







    Used for creating and resolving pools of requests.

    





Properties
----------


**$requestPool**





    private  $requestPool






**$client**





    private  $client






Methods
-------


public **__construct** (  $client,  $requestPool )











**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $client | GuzzleHttp\Client |  |
| $requestPool | [HelpscoutApi\Contracts\RequestPool](HelpscoutApi-Contracts-RequestPool.md) |  |

--

public **pool** ( Closure $rejectCallbackFunction, Closure $successCallbackFunction )


We pool all the requests using Guzzels Pool and wait for them all to complete.

This will create a set of promises that we wait on for completion before doing the next set
which is set by the `RequestPool` `getConcurreny()` function.

The `$successCallbackFunction` is optional, as you may not want to do anything on success,
how ever the rejected is not. Guzzel doesn&#039;t log errors or store them for us, so it&#039;s important
that we log them our selves.

For the success, we pass in the response object to which you can do with as you please.
This response objecty will be a `GuzzleHttp\Psr7\Response` object.

For the rejected we pass in the reason and the index, the index corelates to the index in the array
of requests passed in.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $rejectCallbackFunction | Closure |  |
| $successCallbackFunction | Closure |  |

--

[API Index](ApiIndex.md)
