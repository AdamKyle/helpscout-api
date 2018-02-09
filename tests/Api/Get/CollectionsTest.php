<?php
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use HelpscoutApi\Contracts\ApiKey;
use PHPUnit\Framework\TestCase;
use HelpscoutApi\Api\Get\Collections;
use HelpscoutApi\Contracts\Collection as CollectionContract;

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

        $apiKeyStub = $this->createMock(ApiKey::class);

        $apiKeyStub->method('getKey')
                  ->willReturn('fakeApiKey');

        $collections = new Collections($client, $apiKeyStub);
        $response = $collections->getAll();

        $this->assertNotEmpty($response);
    }

    public function testGetCollectionWithId() {
        $client = $this->fakeClient();

        $collectionStub = $this->createMock(CollectionContract::class);

        $collectionStub->method('getId')
                       ->willReturn('1');

        $apiKeyStub = $this->createMock(ApiKey::class);

        $apiKeyStub->method('getKey')
                   ->willReturn('fakeApiKey');

        $collections = new Collections($client, $apiKeyStub);
        $response = $collections->getCollectionById($collectionStub);

        $this->assertNotEmpty($response);
    }

    public function testGetCollectionWithNumber() {
        $client = $this->fakeClient();

        $collectionStub = $this->createMock(CollectionContract::class);

        $collectionStub->method('getNumber')
                       ->willReturn('1');

        $apiKeyStub = $this->createMock(ApiKey::class);

        $apiKeyStub->method('getKey')
                   ->willReturn('fakeApiKey');

        $collections = new Collections($client, $apiKeyStub);
        $response = $collections->getCollectionByNumber($collectionStub);

        $this->assertNotEmpty($response);
    }
}
