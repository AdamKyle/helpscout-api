<?php
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use HelpscoutApi\Api\Post\Collection;
use HelpscoutApi\Contracts\CollectionPostBody;
use PHPUnit\Framework\TestCase;
use HelpscoutApi\Contracts\ApiKey;

class CollectionTest extends TestCase {

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

    public function testPostArticle() {
        $client = $this->fakeClient();

        $collectionPostBody = $this->createMock(CollectionPostBody::class);

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $collection = new Collection($client, $apiKeySub);
        $response = $collection->create($collectionPostBody);

        $this->assertNotEmpty($response);
    }
}
