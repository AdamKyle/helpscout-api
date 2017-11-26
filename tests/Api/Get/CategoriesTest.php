<?php
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use HelpscoutApi\Contracts\Collection;
use HelpscoutApi\Contracts\Category;
use HelpscoutApi\Contracts\ApiKey;
use HelpscoutApi\Api\Get\Categories;
use PHPUnit\Framework\TestCase;
use HelpscoutApi\Params\Category as CategoryParams;

class CategoriesTest extends TestCase {

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


    public function testGetAllCategories() {
        $client = $this->fakeClient();

        $collectionSub = $this->createMock(Collection::class);

        $collectionSub->method('getId')
             ->willReturn('1');

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $categories = new Categories($client, $apiKeySub);
        $response = $categories->getAll($collectionSub);

        $this->assertNotEmpty($response);
    }

    public function testGetAllCategoriesWithParam() {
        $client = $this->fakeClient();

        $collectionSub = $this->createMock(Collection::class);

        $collectionSub->method('getId')
             ->willReturn('1');

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $categoryParams = new CategoryParams();
        $categoryParams->page('25');
        $categoryParams->order('asc');

        $categories = new Categories($client, $apiKeySub);
        $response = $categories->getAll($collectionSub, $categoryParams);

        $this->assertNotEmpty($response);
    }

    public function testGetCategoryWithId() {
        $client = $this->fakeClient();

        $categorySub = $this->createMock(Category::class);

        $categorySub->method('getId')
                    ->willReturn('1');

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $categories = new Categories($client, $apiKeySub);
        $response = $categories->getCategoryById($categorySub);

        $this->assertNotEmpty($response);
    }

    public function testGetCategoryWithNumber() {
        $client = $this->fakeClient();

        $categorySub = $this->createMock(Category::class);

        $categorySub->method('getNumber')
                    ->willReturn('1');

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $categories = new Categories($client, $apiKeySub);
        $response = $categories->getCategoryByNumber($categorySub);

        $this->assertNotEmpty($response);
    }
}
