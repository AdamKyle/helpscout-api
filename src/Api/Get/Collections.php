<?php

namespace HelpscoutApi\Api\Get;

use GuzzleHttp\Client;
use HelpscoutApi\Contracts\Collection;
use HelpscoutApi\Contracts\ApiKey;

/**
 * Deals with GET Collection API from helpscout.
 *
 * @link https://developer.helpscout.com/docs-api/collections/list/
 */
class Collections {

    /**
     * GuzzleHttp\Client;
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
     * Get all collections
     *
     * @return \stdClass
     */
    public function getAll() {
        $response = $this->client->request(
            'GET',
            'collections',
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'auth' => [$this->apiKey, 'X']
            ]
        );

        return json_decode($response->getBody()->getContents());
    }

    /**
     * Get a single collection based off the ID
     *
     * @param Collection
     * @return \stdClass
     */
    public function getCollectionById(Collection $collection) {
        $response = $this->client->request(
            'GET',
            'collections/' . $collection->getId(),
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'auth' => [$this->apiKey, 'X']
            ]
        );

        return json_decode($response->getBody()->getContents());
    }

    /**
     * Get a single collection based off the number
     *
     * @param Category
     * @return \stdClass
     */
    public function getCollectionByNumber(Collection $collection) {
        $response = $this->client->request(
            'GET',
            'collections/' . $collection->getNumber(),
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'auth' => [$this->apiKey, 'X']
            ]
        );

        return json_decode($response->getBody()->getContents());
    }
}
