<?php
use PHPUnit\Framework\TestCase;
use HelpscoutApi\Response\Response;
use GuzzleHttp\Psr7\Response as GuzzleResponse;
use GuzzleHttp\Psr7;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;

class ResponseTest extends TestCase {

    private $client;

    public function setUp() {
        parent::setUp();

        $body = Psr7\stream_for(json_encode(['something' => ['id' => 'xxxx']]));
        $mock = new MockHandler([
            new GuzzleResponse(200, ['Location' => 'https://docsapi.helpscout.net/v1/sample/xxxxx'], $body),
        ]);

        $handler = HandlerStack::create($mock);
        $this->client  = new Client(['handler' => $handler]);
    }

    public function testGetLocation() {
        $response = $this->client->request('POST', '/');
        $resp = new Response($response);
        $this->assertEquals('https://docsapi.helpscout.net/v1/sample/xxxxx', $resp->getLocation());
    }

    public function testGetBodyOfRequest() {
        $response = $this->client->request('POST', '/');
        $resp = new Response($response);
        $this->assertEquals('xxxx', $resp->getContents()->something->id);
    }
}
