<?php

namespace HelpscoutApi\Api\Get;

use App\HelpScout\lib\HelpScout\Api\ApiClient;
use HelpscoutApi\Contracts\ApiKey;
use HelpscoutApi\Contracts\Article;
use HelpscoutApi\Contracts\Category;
use HelpscoutApi\Contracts\Collection;
use HelpscoutApi\Contracts\Revision;
use HelpscoutApi\Query\Article as ArticleQuery;
use HelpscoutApi\Params\Article as ArticleParams;
use GuzzleHttp\Client;

/**
 * Deals with GET Articles API from helpscout.
 *
 * @link https://developer.helpscout.com/docs-api/categories/list/
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
     * Get all articles from a category and return as JSON.
     *
     * Uses the category to get the article information.
     *
     * You can pass in an optional ArticleParams object in which you set
     * the order in which the articles are sorted by.
     *
     * @param CategoryValue
     * @param ArticleParams - Optional
     * @return JSON
     * @see ArticleParams
     */
    public function getAllFromCategory(
        Category $categoryValue,
        ArticleParams $articleParams = null)
    {
        $params = '';

        if ($articleParams !== null) {
            $params = $articleParams->getParams();
        }

        $response = $this->client->request(
            'GET',
            'categories/' . $categoryValue->getId() . '/articles' . $params,
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
     * Get all articles from a collection and return as JSON.
     *
     * Uses the collection to get the article information.
     *
     * You can pass in an optional ArticleParams object in which you set
     * the order in which the articles are sorted by.
     *
     * @param CategoryValue
     * @param ArticleParams - Optional
     * @return JSON
     * @see ArticleParams
     */
    public function getAllFromCollection(
        Collection $collection,
        ArticleParams $articleParams = null)
    {
        $params = '';

        if ($articleParams !== null) {
            $params = $articleParams->getParams();
        }

        $response = $this->client->request(
            'GET',
            'categories/' . $collection->getId() . '/articles' . $params,
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
     * Optional param is draft, which gets back or allows you to get back a draft
     * article.
     *
     * @param Boolean - optional
     * @param CategoryValue
     * @return JSON
     */
    public function getSingle(Article $articleValue, bool $draft = false) {
        $response = $this->client->request(
            'GET',
            'articles/' . $articleValue->getId() . '?draft=' . $draft,
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
     * We also allow you to pass in an optional ArticleParams which allows you to set the
     * params of the url to be passed in.
     *
     * @param CategoryValue
     * @param ArticleParams - Optional
     * @return JSON
     * @see ArticleParams
     */
    public function getRelatedArticles(
        Article $articleValue,
        ArticleParams $articleParams = null)
    {
        $params = '';

        if ($articleParams !== null) {
            $params = $articleParams->getParams();
        }

        $response = $this->client->request(
            'GET',
            'articles/' . $articleValue->getId() . '/related' . $params,
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
     * and then using the `getQuery` to get the query for the
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

    /**
     * Get all article revisions
     *
     * You can pass in an optinal param called page which sets the page of revisions to
     * get back.
     *
     * @param Article
     * @param String
     * @return JSON
     */
    public function getRevisions(Article $article, Sting $page = null) {
        $params = '';

        if ($page !== null) {
            $params = '?page=' . $page;
        }

        $response = $this->client->request(
            'GET',
            'articles/' . $article->getId() . '/revisions' . $params,
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
     * Get an article revision
     *
     * @param Revision
     * @return JSON
     */
    public function getRevision(Article $article) {
        $response = $this->client->request(
            'GET',
            'revisions/' . $article->getId(),
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
