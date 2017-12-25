<?php
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use HelpscoutApi\Api\Post\Category;
use HelpscoutApi\Contracts\CategoryPostBody;
use PHPUnit\Framework\TestCase;
use HelpscoutApi\Contracts\ApiKey;

class CategoryTest extends TestCase {

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

        $categoryPostBody = $this->createMock(CategoryPostBody::class);

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $category = new Category($client, $apiKeySub);
        $response = $category->create($categoryPostBody);

        $this->assertNotEmpty($response);
    }

    public function testCreateAsyncCategoryIsPormise() {
        $client = $this->fakeClient();

        $categoryPostBody = $this->createMock(CategoryPostBody::class);

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $category = new Category($client, $apiKeySub);
        $async = $category->createAsync($categoryPostBody);

        $this->assertInstanceOf('GuzzleHttp\Promise\Promise', $async);
    }

    public function testCreateRequestCategory() {
        $client = $this->fakeClient();

        $categoryPostBody = $this->createMock(CategoryPostBody::class);

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $category = new Category($client, $apiKeySub);
        $result = $category->createRequest($categoryPostBody);

        $this->assertInstanceOf('GuzzleHttp\Psr7\Request', $result);
    }
}
