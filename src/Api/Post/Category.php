<?php

namespace HelpscoutApi\Api\Post;

use GuzzleHttp\Client;
use HelpscoutApi\Contracts\CategoryPostBody;
use HelpscoutApi\Contracts\ApiKey;

/**
 * Allows you to post an category to Helpscout using the API.
 *
 * @link https://developer.helpscout.com/docs-api/categories/create/
 */
class Category {
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
     * Post an category to the Helpscout API.
     *
     * @param CategoryPostBody
     * @link https://developer.helpscout.com/docs-api/categories/create/
     */
    public function create(CategoryPostBody $categoryPostBody) {
      $response = $this->client->request(
        'POST',
        'categories',
        [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
             ],
            'auth' => [$this->apiKey, 'X'],
            'body' => $categoryPostBody->createPostBody(),
        ]
      );

      return $response;
    }
}
