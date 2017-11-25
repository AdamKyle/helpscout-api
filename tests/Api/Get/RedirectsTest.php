<?php
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use HelpscoutApi\Api\Get\Redirects;
use HelpscoutApi\Contracts\ApiKey;
use HelpscoutApi\Contracts\Site;
use HelpscoutApi\Contracts\Redirect;
use PHPUnit\Framework\TestCase;

class RedirectsTest extends TestCase {

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


    public function testGetAllRedirects() {
        $client = $this->fakeClient();

        $siteSub = $this->createMock(Site::class);

        $siteSub->method('getId')
                ->willReturn('1');

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $redirects = new Redirects($client, $apiKeySub);
        $response = $redirects->getAll($siteSub);

        $this->assertNotEmpty($response);
    }

    public function testGetSingleRedirect() {
        $client = $this->fakeClient();

        $redirectSub = $this->createMock(Redirect::class);

        $redirectSub->method('getId')
                    ->willReturn('1');

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $redirects = new Redirects($client, $apiKeySub);
        $response = $redirects->getSingle($redirectSub);

        $this->assertNotEmpty($response);
    }

    public function testFindRedirect() {
        $client = $this->fakeClient();

        $siteSub = $this->createMock(Site::class);

        $siteSub->method('getId')
                ->willReturn('1');

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $redirects = new Redirects($client, $apiKeySub);
        $response = $redirects->findRedirect('/old/path/123', $siteSub);

        $this->assertNotEmpty($response);
    }
}
