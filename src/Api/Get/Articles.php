<?php

namespace HelpscoutApi\Api\Get;

use App\HelpScout\lib\HelpScout\Api\ApiClient;
use HelpscoutApi\Contracts\ApiKey;
use HelpscoutApi\Contracts\Article;
use HelpscoutApi\Contracts\Category;
use HelpscoutApi\Query\Article as ArticleQuery;
use GuzzleHttp\Client;

/**
 * Deals with GET Articles API from helpscout.
 *
 * @@link https://developer.helpscout.com/docs-api/categories/list/
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
                'auth' => [$this->apiKey, 'X']
            ]
        );

        return json_decode($response->getBody()->getContents());
    }

    /**
     * Get all related articles for a specific article
     *
     * Gets all related articles based on the article information, such as id.
     *
     * @param CategoryValue
     * @return JSON
     */
    public function getRelatedArticles(Article $articleValue) {
        $response = $this->client->request(
            'GET',
            'articles/' . $articleValue->getId() . '/related',
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
     * Search the articles based on an article query
     *
     * The article query is a string which is built from seting values
     * and then using the <code>getQuery</code> to get the query for the
     * endpoint.
     *
     * @param ArticleQuery
     * @return JSON
     */
    public function searchArticles(ArticleQuery $articleQuery) {
        $response = $this->client->request(
            'GET',
            'search/articles' . $articleQuery->getQuery(),
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
