[API Index](ApiIndex.md)


HelpscoutApi\Response\Response
---------------


**Class name**: Response

**Namespace**: HelpscoutApi\Response







    Response builder for the api POST/UPDATE/DELETE requests.

    This class is used to information from the response object,
such as location of the created or updated response and the
id of created or updated resources.





Properties
----------


**$response**





    private  $response






Methods
-------


public **__construct** (  $response )











**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $response | GuzzleHttp\Psr7\Response |  |

--

public **getLocation** (  )


Get the location of created resource.

When a resource is created, the header contains a &#039;Location&#039; key and value.






--

public **getContents** (  )


Gets the body contents of the response








--

[API Index](ApiIndex.md)
