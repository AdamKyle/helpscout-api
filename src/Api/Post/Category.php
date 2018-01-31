<?php

namespace HelpscoutApi\Api\Post;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use HelpscoutApi\Contracts\CategoryPostBody;
use HelpscoutApi\Contracts\ApiKey;
use GuzzleHttp\Psr7\Request;

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
        try {
            $response = $this->client->request(
                'POST',
                'categories?reload=true',
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
        } catch (BadResponseException $e) {
            return $e->getResponse();
        }
    }

    /**
     * Create the category in an asynchronous way.
     *
     * Same method signature and options as `create`.
     *
     * This is great for when you need to create a set of categories that do not
     * got over the rate limit.
     *
     * @param CategoryPostBody
     * @return \GuzzleHttp\Promise\Promise
     * @link https://developer.helpscout.com/docs-api/articles/create/
     */
    public function createAsync(CategoryPostBody $categoryPostBody) {
        return $this->client->requestAsync(
            'POST',
            'categories?reload=true',
             [
                 'headers' => [
                     'Accept' => 'application/json',
                     'Content-Type' => 'application/json',
                 ],
                 'auth' => [$this->apiKey, 'X'],
                 'body' => $categoryPostBody->createPostBody(),
             ]
        );
    }

    /**
     * Returns a new request object
     *
     * This is good for creating pools of requests. This is when you
     * don't know how many requests you need to create and thus might go over
     * the rate limit.
     *
     * @param CategoryPostBody
     * @return \GuzzleHttp\Psr7\Request
     * @link https://developer.helpscout.com/docs-api/articles/create/
     */
    public function createRequest(CategoryPostBody $categoryPostBody) {
        return new Request(
            'POST',
            'https://docsapi.helpscout.net/v1/categories?reload=true',
            [
                'Accept'        => 'application/json',
                'Content-Type'  => 'application/json',
                'Authorization' => 'Basic '. base64_encode($this->apiKey.':X')
            ],
            $categoryPostBody->createPostBody()
        );
    }
}
