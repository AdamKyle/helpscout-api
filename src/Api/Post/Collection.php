<?php

namespace HelpscoutApi\Api\Post;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use HelpscoutApi\Contracts\CollectionPostBody;
use HelpscoutApi\Contracts\ApiKey;

/**
 * Allows you to post an collection to Helpscout using the API.
 *
 * @link https://developer.helpscout.com/docs-api/collection/create/
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
     * Post an collection to the Helpscout API.
     *
     * @param CollectionPostBody
     * @link https://developer.helpscout.com/docs-api/collection/create/
     */
    public function create(CollectionPostBody $collectionPostBody) {
        try {
            $response = $this->client->request(
                'POST',
                'collections',
                [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                    ],
                    'auth' => [$this->apiKey, 'X'],
                    'body' => $collectionPostBody->createPostBody(),
                ]
            );

            return $response;
        } catch (BadResponseException $e) {
            return $e->getResponse();
        }
    }
}
