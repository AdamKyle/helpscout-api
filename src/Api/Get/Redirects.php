<?php

namespace HelpscoutApi\Api\Get;

use App\HelpScout\lib\HelpScout\Api\ApiClient;
use HelpscoutApi\Contracts\ApiKey;
use HelpscoutApi\Contracts\Site;
use HelpscoutApi\Contracts\Redirect;
use GuzzleHttp\Client;

/**
 * Deals with GET Redirects API from helpscout.
 *
 * @link https://developer.helpscout.com/docs-api/redirects/list/
 */
class Redirects {

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
     * Get all redirects based on a site.
     *
     * @param Site
     * @return JSON
     */
    public function getAll(Site $site) {
        $response = $this->client->request(
            'GET',
            'redirects/site/' . $site->getId(),
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
     * Get a single redirect based on redirect id
     *
     * @param Redirect
     * @return JSON
     */
    public function getSingle(Redirect $redirect) {
        $response = $this->client->request(
            'GET',
            'articles/' . $redirect->getId(),
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
     * Find a redirect based on a url and a site.
     *
     * The url is the url in which will resolve the redirect.
     *
     * The response url could be null if the given url does not redirect
     * anyway.
     *
     * The url can be: <code>/old/path/123</code> for example, which,
     * if it has a redirect will return the redirected path.
     *
     * @param String
     * @param Site
     * @return JSON
     * @link https://developer.helpscout.com/docs-api/redirects/find/
     */
    public function findRedirect(string $url, Site $site) {
        $response = $this->client->request(
            'GET',
            'redirects?' . $url . '&' . $site->getId(),
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
