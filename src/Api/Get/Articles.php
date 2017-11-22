<?php

namespace HelpscoutApi\Api\Get;

use App\HelpScout\lib\HelpScout\Api\ApiClient;
use HelpscoutApi\Contracts\ApiKey;
use HelpscoutApi\Contracts\Article;
use HelpscoutApi\Contracts\Category;
use GuzzleHttp\Client;

/**
 * Gets all or a single article based on a category passed in.
 */
class Articles {

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
     * Get all articles and return as JSON.
     *
     * Uses the category to get the article information.
     *
     * @param CategoryValue
     * @return JSON
     */
    public function getAll(Category $categoryValue) {
        $response = $this->client->request(
            'GET',
            'categories/' . $categoryValue->getId() . '/articles',
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
     * Get an article and return as JSON.
     *
     * Gets the article based on the article information, such as id.
     *
     * @param CategoryValue
     * @return JSON
     */
    public function getSingle(Article $articleValue) {
        $response = $this->client->request(
            'GET',
            'articles/' . $articleValue->getId(),
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
