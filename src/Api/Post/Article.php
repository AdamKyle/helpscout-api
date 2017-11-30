<?php

namespace HelpscoutApi\Api\Post;

use GuzzleHttp\Client;
use HelpscoutApi\Contracts\ArticlePostBody;

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
    $response = $this->client->request(
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

    return $response;
  }

}
