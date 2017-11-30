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

        $articlePostBodyStub->method('collectionId')
                            ->with('123');

        $articlePostBodyStub->method('name')
                            ->with('sample');

        $articlePostBodyStub->method('text')
                            ->with('something');


        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $article = new Article($client, $apiKeySub);
        $response = $article->create($articlePostBodyStub);

        $this->assertNotEmpty($response);
    }
}
