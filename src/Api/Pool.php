<?php

namespace HelpscoutApi\Api;

use HelpscoutApi\Contracts\RequestPool;
use GuzzleHttp\Pool as GuzzelPool;
use GuzzleHttp\Client;

/**
 * Used for creating and resolving pools of requests.
 */
class Pool {
    private $requestPool;
    private $client;

    public function __construct(Client $client, RequestPool $requestPool) {
        $this->requestPool = $requestPool;
        $this->client = $client;
    }

    /**
     * We pool all the requests using Guzzels Pool and wait for them all to complete.
     *
     * This will create a set of promises that we wait on for completion before doing the next set
     * which is set by the `RequestPool` `getConcurreny()` function.
     *
     * The `$successCallbackFunction` is optional, as you may not want to do anything on success,
     * how ever the rejected is not. Guzzel doesn't log errors or store them for us, so it's important
     * that we log them our selves.
     *
     * For the success, we pass in the response object to which you can do with as you please.
     * This response objecty will be a `GuzzleHttp\Psr7\Response` object.
     *
     * For the rejected we pass in the reason and the index, the index corelates to the index in the array
     * of requests passed in.
     *
     * @param \Closure
     * @param \Closure
     */
    public function pool($rejectCallbackFunction, $successCallbackFunction = null) {
        $concurrency = $this->requestPool->getConcurrency();

        if (is_null($concurrency) || $concurrency <= 0) {
            $concurrency = 20;
        }

        $pool = new GuzzelPool($this->client, $this->requestPool->getRequests(), [
            'concurrency' => $concurrency,
            'fulfilled'   => function ($response, $index) use (&$successCallbackFunction) {
                // Pass the JSON back to a callback function if not null:
                if (!is_null($successCallbackFunction)) {

                    call_user_func_array($successCallbackFunction, array($response));
                }
            },
            'rejected'   => function ($reason, $index) use (&$rejectedCallbackFunction)  {
                call_user_func_array($rejectedCallbackFunction, array($reason, $index));
            },
        ]);

        $promise = $pool->promise();
        $promise->wait();
    }
}
