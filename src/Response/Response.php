<?php

namespace HelpscoutApi\Response;

use GuzzleHttp\Psr7\Response as GuzzleResponse;

/**
 * Response builder for the api POST/UPDATE/DELETE requests.
 *
 * This class is used to information from the response object,
 * such as location of the created or updated response and the
 * id of created or updated resources.
 */
class Response {

    /**
     * @link http://docs.guzzlephp.org/en/stable/psr7.html#responses
     */
    private $response;

    public function __construct(GuzzleResponse $response) {
        $this->response = $response;
    }

    /**
     * Get the location of created resource.
     *
     * When a resource is created, the header contains a 'Location' key and value.
     *
     * @return string
     */
    public function getLocation() {
        return $this->response->getHeaders()['Location'][0];
    }

    /**
     * Gets the created object.
     *
     * Only works if you passed { 'reload': true } to the body of the
     * create request.
     *
     * @return
     */
    public function getCreated() {
        json_decode($this->response->getBody()->getContents());
    }
}
