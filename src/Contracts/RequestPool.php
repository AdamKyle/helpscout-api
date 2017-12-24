<?php
namespace HelpscoutApi\Contracts;

use GuzzleHttp\Psr7\Request;

/**
 * For storing Request Pools
 *
 * Request pool pushes a Request object to an array of requests.
 * these are then used in the Guzzel Pool, to resolve over a set period of
 * time.
 */
interface RequestPool {

    /**
     * Push a request to the array of requests.
     *
     * @param GuzzleHttp\Psr7\Request
     */
    public function pushRequest(Request $request);

    /**
     * Get all the requests.
     *
     * @return array
     */
    public function getRequests(): array;

    /**
     * Set the concurrency.
     *
     * How many to do before we wait for them to complete.
     *
     * @param int
     */
    public function setConcurrency(int $concurrency);

    /**
     * Get the concurrency.
     *
     * How many to do before we wait for them to complete.
     *
     * @return int
     */
    public function getConcurrency(): int;
}
