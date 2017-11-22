<?php

namespace HelpscoutApi\Api\Get;

use GuzzleHttp\Client;
use HelpscoutApi\Contracts\Collection;
use HelpscoutApi\Contracts\ApiKey;

/**
 * Get all categories based on a collection
 */
class Categories {

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
        $this->apiKey = $apiKey;
    }

    /**
     * Get all collections.
     *
     * @param Collection
     * @return JSON
     */
    public function getAll(Collection $collection) {
        $response = $this->client->request(
            'GET',
            'collections/' . $collection->getId() . '/categories',
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'auth' => $this->apiKey
            ]
        );

        return json_decode($response->getBody()->getContents());
    }
}
