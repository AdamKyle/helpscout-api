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
use GuzzleHttp\Psr7\Request;

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
     * @return \stdClass
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
     * @param Collection
     * @param ArticleParams - Optional
     * @return \stdClass
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
            'collections/' . $collection->getId() . '/articles' . $params,
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
     *  Create a Collection Get Request.
     *
     * This works the same was as a `getAllFromCollection` function, instead
     * of returning a JSON repersentation, we return a Request object that you
     * would then use the the Pool class.
     *
     * @param Collection
     * @param ArticleParams
     * @return \GuzzleHttp\Psr7\Request
     * @link https://developer.helpscout.com/docs-api/articles/create/
     */
    public function collectionGetRequest(
        Collection $collection,
        ArticleParams $articleParams = null)
    {
        $params = '';

        if ($articleParams !== null) {
            $params = $articleParams->getParams();
        }

        return new Request(
            'GET',
            'collections/' . $collection->getId() . '/articles' . $params,
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic '. base64_encode($this->apiKey.':X')
            ]
        );
    }

    /**
     * Get an article and return as JSON.
     *
     * Gets the article based on the article information, such as id.
     *
     * Optional param is draft, which gets back or allows you to get back a draft
     * article.
     *
     * @param Article
     * @param Boolean - optional
     * @return \stdClass
     */
    public function getSingle(Article $articleValue, bool $draft = false) {

        // Convert draft to string
        $stringDraft = ($draft) ? 'true' : 'false';

        $response = $this->client->request(
            'GET',
            'articles/' . $articleValue->getId() . '?draft=' . $stringDraft,
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
     * Simmilar to getSingle, returns a request object instead.
     *
     * @param Article
     * @param Boolean - optional
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getSingleRequest(Article $articleValue, bool $draft = false) {
        // Convert draft to string
        $stringDraft = ($draft) ? 'true' : 'false';

        return new Request(
            'GET',
            'articles/' . $articleValue->getId() . '?draft=' . $stringDraft,
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                 ],
                'auth' => [$this->apiKey, 'X']
            ]
        );
    }

    /**
     * Uses sendAsync to send a psr7 request.
     *
     * @param \GuzzleHttp\Psr7\Request
     * @return \GuzzleHttp\Promise\Promise
     */
    public function getSingleAsync(Request $request) {
        return $this->client->sendAsync($request);
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
     * @return \stdClass
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
     * @return \stdClass
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
     * @return \stdClass
     */
    public function getRevisions(Article $article, string $page = null) {
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
     * @return \stdClass
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
