<?php
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use HelpscoutApi\Contracts\ApiKey;
use PHPUnit\Framework\TestCase;
use HelpscoutApi\Api\Get\Collections;

class CollectionsTest extends TestCase {

    public function fakeClient() {

        $mock = new MockHandler([
            new Response(
                200,
                ['X-Foo' => 'Bar'],
                json_encode([
                    'something' => 'else'
                ])
            ),
        ]);

        $handler = HandlerStack::create($mock);
        return new Client([
            'base_uri' => 'https://docsapi.helpscout.net/v1/',
            'handler' => $handler
        ]);
    }


    public function testGetAllArticles() {
        $client = $this->fakeClient();

         $apiKeySub = $this->createMock(ApiKey::class);

         $apiKeySub->method('getKey')
              ->willReturn('fakeApiKey');

        $collections = new Collections($client, $apiKeySub);
        $response = $collections->getAll();

        $this->assertNotEmpty($response);
    }
}
