<?php
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use HelpscoutApi\Api\Delete\Category;
use HelpscoutApi\Contracts\ApiKey;
use HelpscoutApi\Contracts\Category as CategoryContract;
use PHPUnit\Framework\TestCase;

class CategoryDeleteTest extends TestCase {

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

        $categoryStub = $this->createMock(CategoryContract::class);

        $categoryStub->method('getId')
                     ->willReturn('1');

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $category = new Category($client, $apiKeySub);
        $response = $category->delete($categoryStub);

        $this->assertNotEmpty($response);
    }
}
