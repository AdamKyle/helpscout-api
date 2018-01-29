<?php

namespace HelpscoutApi\Api\Get;

use GuzzleHttp\Client;
use HelpscoutApi\Contracts\ApiKey;
use Violet\StreamingJsonEncoder\BufferJsonEncoder;

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

        return (new BufferJsonEncoder($response->getBody()->getContents()))->->setOptions(JSON_FORCE_OBJECT)->encode();
    }
}
