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
use HelpscoutApi\Contracts\RequestPool;
use HelpscoutApi\Api\Pool;

class PoolTest extends TestCase {

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

    public function testPool() {
        $client = $this->fakeClient();

        $articlePostBodyStub = $this->createMock(ArticlePostBody::class);

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $article = new Article($client, $apiKeySub);
        $result = $article->createRequest($articlePostBodyStub);

        $requestPoolMock = $this->createMock(RequestPool::class);
        $requestPoolMock->method('getRequests')
                        ->willReturn([$result]);

        $requestPoolMock->method('getConcurrency')
                        ->willReturn(1);


        $pool = new Pool($client);
        $pool->pool(
            $requestPoolMock,
            function($reason, $index) {},
            function($response) {
                $this->assertNotEmpty($response);
            }
        );
    }
}
