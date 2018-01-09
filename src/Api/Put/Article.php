<?php

namespace HelpscoutApi\Api\Put;

use GuzzleHttp\Client;
use HelpscoutApi\Contracts\ArticlePutBody;
use HelpscoutApi\Contracts\ApiKey;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Psr7\Request;

/**
* Allows you to put an article to Helpscout using the API.
*
* @link https://developer.helpscout.com/docs-api/articles/update/
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
     * PUT an article to the Helpscout API.
     *
     * @param ArticlePostBody
     * @link https://developer.helpscout.com/docs-api/articles/update/
     */
    public function update(ArticlePutBody $articlePutBody) {
        try {
            $response = $this->client->request(
                'PUT',
                'articles/' . $articlePutBody->getId(),
                 [
                     'headers' => [
                         'Accept' => 'application/json',
                         'Content-Type' => 'application/json',
                     ],
                     'auth' => [$this->apiKey, 'X'],
                     'body' => $articlePutBody->createPutBody(),
                 ]
            );

            return $response;
        } catch(BadResponseException $e) {
            return $e->getResponse();
        }
    }

    /**
     * PUT the article in an asynchronous way.
     *
     * Same method signature and options as `update`.
     *
     * This is great for when you need to put a set of articles that do not
     * got over the rate limit.
     *
     * @param ArticlePutBody
     * @return \GuzzleHttp\Promise\Promise
     * @link https://developer.helpscout.com/docs-api/articles/update/
     */
    public function updateAsync(ArticlePutBody $articlePutBody) {
        return $this->client->requestAsync(
            'PUT',
            'articles/' . $articlePutBody->getId(),
             [
                 'headers' => [
                     'Accept' => 'application/json',
                     'Content-Type' => 'application/json',
                 ],
                 'auth' => [$this->apiKey, 'X'],
                 'body' => $articlePutBody->createPutBody(),
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
     * @param ArticlePutBody
     * @return \GuzzleHttp\Psr7\Request
     * @link https://developer.helpscout.com/docs-api/articles/update/
     */
    public function updateRequest(ArticlePutBody $articlePutBody) {
        return new Request(
            'PUT',
            'https://docsapi.helpscout.net/v1/articles/' . $articlePutBody->getId(),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic '. base64_encode($this->apiKey.':X')
            ],
            $articlePutBody->createPutBody()
        );
    }
}
