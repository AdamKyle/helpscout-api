<?php

namespace HelpscoutApi\Api\Get;

use App\HelpScout\lib\HelpScout\Api\ApiClient;
use HelpscoutApi\Contracts\ApiKey;
use HelpscoutApi\Contracts\Site;
use HelpscoutApi\Query\Article as ArticleQuery;
use GuzzleHttp\Client;
use Violet\StreamingJsonEncoder\BufferJsonEncoder;

/**
 * Deals with GET Sites API from helpscout.
 *
 * @link https://developer.helpscout.com/docs-api/sites/list/
 */
class Sites {

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
     * Get all sites
     *
     * @return \stdClass
     */
    public function getAll() {
        $response = $this->client->request(
            'GET',
            'sites',
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                 ],
                'auth' => [$this->apiKey, 'X']
            ]
        );

        return (new BufferJsonEncoder($response->getBody()->getContents()))->encode();
    }

    /**
     * Get all sites for a particular page
     *
     * @param String
     * @return \stdClass
     */
    public function getAllForPage(string $page = '1') {
        $response = $this->client->request(
            'GET',
            'sites?page=' . $page,
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                 ],
                'auth' => [$this->apiKey, 'X']
            ]
        );

        return (new BufferJsonEncoder($response->getBody()->getContents()))->encode();
    }

    /**
     * Get an article and return as JSON.
     *
     * Gets the article based on the article information, such as id.
     *
     * @param Site
     * @return \stdClass
     */
    public function getSingle(Site $site) {
        $response = $this->client->request(
            'GET',
            'sites/' . $site->getId(),
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                 ],
                'auth' => [$this->apiKey, 'X']
            ]
        );

        return (new BufferJsonEncoder($response->getBody()->getContents()))->encode();
    }
}
