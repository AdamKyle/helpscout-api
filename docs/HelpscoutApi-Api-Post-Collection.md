[API Index](ApiIndex.md)


HelpscoutApi\Api\Post\Collection
---------------


**Class name**: Collection

**Namespace**: HelpscoutApi\Api\Post







    Allows you to post an collection to Helpscout using the API.

    





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

public **create** ( CollectionPostBody $collectionPostBody )


Post an collection to the Helpscout API.








**Parameters**:

| Parameter | Type | Description |
|-----------|------|-------------|
| $collectionPostBody | [CollectionPostBody](HelpscoutApi-Contracts-CollectionPostBody.md) |  |

--

[API Index](ApiIndex.md)
