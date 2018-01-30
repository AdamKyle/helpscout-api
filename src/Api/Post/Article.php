<?php

namespace HelpscoutApi\Api\Post;

use GuzzleHttp\Client;
use HelpscoutApi\Contracts\ArticlePostBody;
use HelpscoutApi\Contracts\ApiKey;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Psr7\Request;

/**
* Allows you to post an article to Helpscout using the API.
*
* @link https://developer.helpscout.com/docs-api/articles/create/
*/
class Article {

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
     * Post an article to the Helpscout API.
     *
     * @param ArticlePostBody
     * @link https://developer.helpscout.com/docs-api/articles/create/
     */
    public function create(ArticlePostBody $articlePostBody) {
        try {
            $response = $this->client->request(
                'POST',
                'articles?reload=true',
                 [
                     'headers' => [
                         'Accept' => 'application/json',
                         'Content-Type' => 'application/json',
                     ],
                     'auth' => [$this->apiKey, 'X'],
                     'body' => $articlePostBody->createPostBody(),
                 ]
            );

            return $response;
        } catch(BadResponseException $e) {
            return $e->getResponse();
        }
    }

    /**
     * Create the article in an asynchronous way.
     *
     * Same method signature and options as `create`.
     *
     * This is great for when you need to create a set of articles that do not
     * got over the rate limit.
     *
     * @param ArticlePostBody
     * @return \GuzzleHttp\Promise\Promise
     * @link https://developer.helpscout.com/docs-api/articles/create/
     */
    public function createAsync(ArticlePostBody $articlePostBody) {
        return $this->client->requestAsync(
            'POST',
            'articles',
             [
                 'headers' => [
                     'Accept' => 'application/json',
                     'Content-Type' => 'application/json',
                 ],
                 'auth' => [$this->apiKey, 'X'],
                 'body' => $articlePostBody->createPostBody(),
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
     * @param ArticlePostBody
     * @return \GuzzleHttp\Psr7\Request
     * @link https://developer.helpscout.com/docs-api/articles/create/
     */
    public function createRequest(ArticlePostBody $articlePostBody) {
        return new Request(
            'POST',
            'https://docsapi.helpscout.net/v1/articles',
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic '. base64_encode($this->apiKey.':X')
            ],
            $articlePostBody->createPostBody()
        );
    }
}
