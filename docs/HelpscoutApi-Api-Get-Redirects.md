[API Index](ApiIndex.md)


HelpscoutApi\Api\Get\Redirects
---------------


**Class name**: Redirects

**Namespace**: HelpscoutApi\Api\Get







    Deals with GET Redirects API from helpscout.

    





Properties
----------


**$client**

GuzzleHttp\Client



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

public **getAll** ( Site $site )


Get all redirects based on a site.








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $site | [Site](HelpscoutApi-Contracts-Site.md) |  |

--

public **getSingle** ( Redirect $redirect )


Get a single redirect based on redirect id








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $redirect | [Redirect](HelpscoutApi-Contracts-Redirect.md) |  |

--

public **findRedirect** ( String $url, Site $site )


Find a redirect based on a url and a site.

The url is the url in which will resolve the redirect.

The response url could be null if the given url does not redirect
anyway.

The url can be: &lt;code&gt;/old/path/123&lt;/code&gt; for example, which,
if it has a redirect will return the redirected path.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $url | String |  |
| $site | [Site](HelpscoutApi-Contracts-Site.md) |  |

--

[API Index](ApiIndex.md)
