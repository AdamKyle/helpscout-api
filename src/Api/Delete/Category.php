<?php

namespace HelpscoutApi\Api\Delete;

use App\HelpScout\lib\HelpScout\Api\ApiClient;
use HelpscoutApi\Contracts\ApiKey;
use HelpscoutApi\Contracts\Category as CategoryContract;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\BadResponseException;

/**
 * Deals with Deleteing Categories API from helpscout.
 *
 * @link https://developer.helpscout.com/docs-api/categories/delete/
 */
class Category {

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
     * Delete an article based on the category id.
     *
     * @param HelpscoutApi\Contracts\Category
     * @return \GuzzleHttp\Psr7\Response
     */
    public function delete(CategoryContract $category)
    {

        try {
            return $this->client->request(
                'DELETE',
                'categories/' . $category->getId(),
                [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                     ],
                    'auth' => [$this->apiKey, 'X'],
                    'body' => json_encode(['id' => $category->getId()]),
                ]
            );
        } catch (BadResponseException $e) {
            return $e->getResponse();
        }
    }

}
