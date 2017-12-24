<?php
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use HelpscoutApi\Api\Post\Article;
use HelpscoutApi\Contracts\ArticlePostBody;
use PHPUnit\Framework\TestCase;
use HelpscoutApi\Contracts\ApiKey;
use GuzzleHttp\Promise;

class ArticleTest extends TestCase {

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

        $articlePostBodyStub = $this->createMock(ArticlePostBody::class);

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $article = new Article($client, $apiKeySub);
        $response = $article->create($articlePostBodyStub);

        $this->assertNotEmpty($response);
    }

    public function testPostAsyncArticle() {
        $client = $this->fakeClient();

        $articlePostBodyStub = $this->createMock(ArticlePostBody::class);

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $article = new Article($client, $apiKeySub);
        $async = $article->createAsync($articlePostBodyStub);

        $results = Promise\settle($async)->wait();

        $this->assertNotEmpty($results);
    }

    public function testCreateAsyncArticleIsPormise() {
        $client = $this->fakeClient();

        $articlePostBodyStub = $this->createMock(ArticlePostBody::class);

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $article = new Article($client, $apiKeySub);
        $async = $article->createAsync($articlePostBodyStub);

        $this->assertInstanceOf('GuzzleHttp\Promise\Promise', $async);
    }

    public function testCreateRequestArticle() {
        $client = $this->fakeClient();

        $articlePostBodyStub = $this->createMock(ArticlePostBody::class);

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $article = new Article($client, $apiKeySub);
        $result = $article->createRequest($articlePostBodyStub);


        $this->assertInstanceOf('GuzzleHttp\Psr7\Request', $result);
    }
}
