<?php
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use HelpscoutApi\Api\Get\Articles;
use HelpscoutApi\Contracts\Category;
use HelpscoutApi\Contracts\Collection;
use HelpscoutApi\Contracts\ApiKey;
use HelpscoutApi\Contracts\Article;
use HelpscoutApi\Query\Article as ArticleQuery;
use PHPUnit\Framework\TestCase;

class ArticlesTest extends TestCase {

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

    public function testGetAllArticlesBasedOnCategory() {
        $client = $this->fakeClient();

        $categoryStub = $this->createMock(Category::class);

        $categoryStub->method('getId')
                     ->willReturn('1');

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $articles = new Articles($client, $apiKeySub);
        $response = $articles->getAllFromCategory($categoryStub);

        $this->assertNotEmpty($response);
    }

    public function testGetAllArticlesBasedOnCollection() {
        $client = $this->fakeClient();

        $collectionSub = $this->createMock(Collection::class);

        $collectionSub->method('getId')
                      ->willReturn('1');

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $articles = new Articles($client, $apiKeySub);
        $response = $articles->getAllFromCollection($collectionSub);

        $this->assertNotEmpty($response);
    }

    public function testGetSingleArticle() {
        $client = $this->fakeClient();

        $articleSub = $this->createMock(Article::class);

        $articleSub->method('getId')
                   ->willReturn('1');

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $articles = new Articles($client, $apiKeySub);
        $response = $articles->getSingle($articleSub);

        $this->assertNotEmpty($response);
    }

    public function testGetRelatedArticles() {
        $client = $this->fakeClient();

        $articleSub = $this->createMock(Article::class);

        $articleSub->method('getId')
                   ->willReturn('1');

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $articles = new Articles($client, $apiKeySub);
        $response = $articles->getRelatedArticles($articleSub);

        $this->assertNotEmpty($response);
    }

    public function testGetArticleSearchResponse() {
        $client = $this->fakeClient();

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $articleQuery = new ArticleQuery();
        $articleQuery->setPage('16');

        $articles = new Articles($client, $apiKeySub);
        $response = $articles->searchArticles($articleQuery);

        $this->assertNotEmpty($response);
    }

    public function testGetAllRevisions() {
        $client = $this->fakeClient();

        $articleSub = $this->createMock(Article::class);

        $articleSub->method('getId')
                   ->willReturn('1');

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $articles = new Articles($client, $apiKeySub);
        $response = $articles->getRevisions($articleSub);

        $this->assertNotEmpty($response);
    }

    public function testGetSingleRevision() {
        $client = $this->fakeClient();

        $articleSub = $this->createMock(Article::class);

        $articleSub->method('getId')
                   ->willReturn('1');

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $articles = new Articles($client, $apiKeySub);
        $response = $articles->getRevision($articleSub);

        $this->assertNotEmpty($response);
    }

    public function testGetCollectionRequest() {
        $client = $this->fakeClient();

        $collectionSub = $this->createMock(Collection::class);

        $collectionSub->method('getId')
                      ->willReturn('1');

        $apiKeySub = $this->createMock(ApiKey::class);

        $apiKeySub->method('getKey')
                  ->willReturn('fakeApiKey');

        $articles = new Articles($client, $apiKeySub);
        $result   = $articles->collectionGetRequest($collectionSub);

        $this->assertInstanceOf('GuzzleHttp\Psr7\Request', $result);
    }
}
