<?php

namespace HelpscoutApi\Api\Get;

use GuzzleHttp\Client;
use HelpscoutApi\Contracts\Collection;
use HelpscoutApi\Contracts\Category;
use HelpscoutApi\Contracts\ApiKey;
use HelpscoutApi\Params\Category as CategoryParams;
use Violet\StreamingJsonEncoder\BufferJsonEncoder;
use GuzzleHttp\Psr7\Request;

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
     * @return \stdClass
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
     * @return \stdClass
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
     * @return \stdClass
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

    /**
     * Get all categories from a collection and return as JSON.
     *
     * Uses the collection to get the category information.
     *
     * You can pass in an optional Categoryparams object in which you set
     * the order in which the categories are sorted by.
     *
     * @param CollectionValue
     * @param CategoryParams - Optional
     * @return \stdClass
     * @see CategoryParams
     */
    public function getAllFromCollection(
        Collection $collection,
        CategoryParams $categoryParams = null)
    {
        $params = '';

        if ($categoryParams !== null) {
            $params = $categoryParams->getParams();
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
     * Get a category and return as JSON.
     *
     * Gets the article based on the category information, such as id.
     *
     * Optional param is draft, which gets back or allows you to get back a draft
     * article.
     *
     * @param Boolean - optional
     * @param CategoryValue
     * @return \stdClass
     */
    public function getSingle(Category $categoryValue, bool $draft = false) {

        // Convert draft to string
        $stringDraft = ($draft) ? 'true' : 'false';

        $response = $this->client->request(
            'GET',
            'categories/' . $categoryValue->getId() . '?draft=' . $stringDraft,
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
     * Create a Collection Get Request.
     *
     * Creates a request object for getting categories with multiple
     * pages or to get multiple categories in general.
     *
     * @param Collection
     * @param CategoryParams
     * @return \GuzzleHttp\Psr7\Request
     * @link https://developer.helpscout.com/docs-api/articles/create/
     */
    public function collectionGetRequest(
        Collection $collection,
        CategoryParams $categoryParams = null)
    {
        $params = '';

        if ($categoryParams !== null) {
            $params = $categoryParams->getParams();
        }

        return new Request(
            'GET',
            'collections/' . $collection->getId() . '/categories' . $params,
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic '. base64_encode($this->apiKey.':X')
            ]
        );
    }
}
