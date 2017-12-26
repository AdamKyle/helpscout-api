<?php
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use HelpscoutApi\Api\Delete\Collection;
use HelpscoutApi\Contracts\ApiKey;
use HelpscoutApi\Contracts\Collection as CollectionContract;
use PHPUnit\Framework\TestCase;

class CollectionDeleteTest extends TestCase {

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

    public function testDeleteArticle() {
        $client = $this->fakeClient();

        $collectionStub = $this->createMock(CollectionContract::class);

        $collectionStub->method('getId')
                       ->willReturn('1');

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $collection = new Collection($client, $apiKeySub);
        $response = $collection->delete($collectionStub);

        $this->assertNotEmpty($response);
    }
}
