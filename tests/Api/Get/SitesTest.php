<?php
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use HelpscoutApi\Contracts\ApiKey;
use HelpscoutApi\Contracts\Site;
use PHPUnit\Framework\TestCase;
use HelpscoutApi\Api\Get\Sites;

class SitesTest extends TestCase {

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


    public function testGetAllSites() {
        $client = $this->fakeClient();

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $sites = new Sites($client, $apiKeySub);
        $response = $sites->getAll();

        $this->assertNotEmpty($response);
    }

    public function testGetAllForPage() {
        $client = $this->fakeClient();

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $sites = new Sites($client, $apiKeySub);
        $response = $sites->getAllForPage('3');

        $this->assertNotEmpty($response);
    }

    public function testGetSingle() {
        $client = $this->fakeClient();

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $siteStub = $this->createMock(Site::class);

        $siteStub->method('getId')
                 ->willReturn('1');

        $sites = new Sites($client, $apiKeySub);
        $response = $sites->getSingle($siteStub);

        $this->assertNotEmpty($response);
    }
}
