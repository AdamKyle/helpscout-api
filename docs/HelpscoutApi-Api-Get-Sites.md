[API Index](ApiIndex.md)


HelpscoutApi\Api\Get\Sites
---------------


**Class name**: Sites

**Namespace**: HelpscoutApi\Api\Get







    Deals with GET Sites API from helpscout.

    





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

public **getAll** (  )


Get all sites








--

public **getAllForPage** ( String $page )


Get all sites for a particular page








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $page | String |  |

--

public **getSingle** ( Site $site )


Get an article and return as JSON.

Gets the article based on the article information, such as id.






**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $site | [Site](HelpscoutApi-Contracts-Site.md) |  |

--

[API Index](ApiIndex.md)
