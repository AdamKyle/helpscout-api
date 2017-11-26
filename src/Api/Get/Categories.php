<?php

namespace HelpscoutApi\Api\Get;

use GuzzleHttp\Client;
use HelpscoutApi\Contracts\Collection;
use HelpscoutApi\Contracts\Category;
use HelpscoutApi\Contracts\ApiKey;
use HelpscoutApi\Params\Category as CategoryParams;

/**
 * Deals with GET Category API from helpscout.
 *
 * @link https://developer.helpscout.com/docs-api/categories/list/
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
        $this->apiKey = $apiKey->getKey();
    }

    /**
     * Get all collections by id.
     *
     * @param Collection
     * @return JSON
     */
    public function getAll(
        Collection $collection,
        CategoryParams $categoryParams = null
    ) {
        $params = '';

        if ($categoryParams !== null) {
            $params = $categoryParams->getparams();
        }

        $response = $this->client->request(
            'GET',
            'collections/' . $collection->getId() . '/categories' . $params,
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
     * Get a single category based off the ID
     *
     * @param Category
     * @return JSON
     */
    public function getCategoryById(Category $category) {
        $response = $this->client->request(
            'GET',
            'categories/' . $category->getId(),
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
     * Get a single category based off the number
     *
     * @param Category
     * @return JSON
     */
    public function getCategoryByNumber(Category $category) {
        $response = $this->client->request(
            'GET',
            'categories/' . $category->getNumber(),
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
