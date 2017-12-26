<?php

namespace HelpscoutApi\Api\Delete;

use App\HelpScout\lib\HelpScout\Api\ApiClient;
use HelpscoutApi\Contracts\ApiKey;
use HelpscoutApi\Contracts\Collection as CollectionContract;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\BadResponseException;

/**
 * Deals with Deleteing Collections API from helpscout.
 *
 * @link https://developer.helpscout.com/docs-api/collection/delete/
 */
class Collection {

    /**
     * GuzzleHttp\Client
     */
    private $client;

    /**
     * HelpscoutApi\Contracts\ApiKey;
     */
    private $apiKey;

    public function __construct(Client $client, ApiKey $apiKey) {
        $this->client = $client;
        $this->apiKey = $apiKey->getKey();
    }

    /**
     * Delete an article based on the category id.
     *
     * @param HelpscoutApi\Contracts\Collection
     * @return \GuzzleHttp\Psr7\Response
     */
    public function delete(CollectionContract $collection)
    {

        try {
            return $this->client->request(
                'DELETE',
                'collections/' . $collection->getId(),
                [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                     ],
                    'auth' => [$this->apiKey, 'X'],
                    'body' => json_encode(['id' => $collection->getId()]),
                ]
            );
        } catch (BadResponseException $e) {
            return $e->getResponse();
        }
    }

}
