<?php

namespace HelpscoutApi\Api\Delete;

use App\HelpScout\lib\HelpScout\Api\ApiClient;
use HelpscoutApi\Contracts\ApiKey;
use HelpscoutApi\Contracts\Article as ArticleContract;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\BadResponseException;

/**
 * Deals with Deleteing Articles API from helpscout.
 *
 * @link https://developer.helpscout.com/docs-api/articles/delete/
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
     * Delete an article based on the article id.
     *
     * @param HelpscoutApi\Contracts\Article
     * @return \GuzzleHttp\Psr7\Response
     */
    public function delete(ArticleContract $article)
    {

        try {
            return $this->client->request(
                'DELETE',
                'articles/' . $article->getId(),
                [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                     ],
                    'auth' => [$this->apiKey, 'X'],
                    'body' => json_encode(['id' => $article->getId()]),
                ]
            );
        } catch (BadResponseException $e) {
            return $e->getResponse();
        }
    }

}
