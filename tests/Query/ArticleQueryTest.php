<?php
use PHPUnit\Framework\TestCase;
use HelpscoutApi\Query\Article;
use HelpscoutApi\Contracts\Collection;
use HelpscoutApi\Contracts\Site;

class ArticleQueryTest extends TestCase {

    public function testDefaultQuery() {
        $article = new Article();
        $this->assertEquals('?query=*', $article->getQuery());
    }

    /**
     * TODO: wait for Helpscout to reply about what exactly is passed in.
     */
    public function testCreateQuery() {
        $article = new Article();
        $article->createQuery('name=something');
        $this->assertEquals('?query=name=something', $article->getQuery());
    }

    public function testSetPage() {
        $article = new Article();
        $article->setPage('25');
        $this->assertEquals('?query=*&page=25', $article->getQuery());
    }

    public function testSetCollectionId() {
        $article = new Article();

        $collection = $this->createMock(Collection::class);
        $collection->method('getId')
                   ->willReturn('1');

        $article->setCollectionId($collection);
        $this->assertEquals('?query=*&collectionId=1', $article->getQuery());
    }

    public function testSetSiteId() {
        $article = new Article();

        $site = $this->createMock(Site::class);
        $site->method('getId')
             ->willReturn('1');

        $article->setSiteId($site);
        $this->assertEquals('?query=*&siteId=1', $article->getQuery());
    }

    public function testSetStatus() {
        $article = new Article();

        $article->setStatus('all');
        $this->assertEquals('?query=*&status=all', $article->getQuery());
    }

    public function testSetStatusIncorrectValue() {
        $article = new Article();

        $article->setStatus('something');
        $this->assertEquals('?query=*&status=all', $article->getQuery());
    }

    public function testSetVisibility() {
        $article = new Article();

        $article->setVisibility('all');
        $this->assertEquals('?query=*&visibility=all', $article->getQuery());
    }

    public function testSetVisibilityIncorrectValue() {
        $article = new Article();

        $article->setVisibility('something');
        $this->assertEquals('?query=*&visibility=all', $article->getQuery());
    }

    public function testMultipleURLParams() {
        $article = new Article();

        $article->setVisibility('public');
        $article->setStatus('published');
        $article->setPage('22');

        $this->assertEquals(
            '?query=*&visibility=public&status=published&page=22',
            $article->getQuery()
        );
    }

    public function testMultipleURLParamsMultipleTimes() {
        $article = new Article();

        $article->setVisibility('public');
        $article->setVisibility('private');
        $article->setStatus('published');
        $article->setStatus('all');
        $article->setPage('22');

        $this->assertEquals(
            '?query=*&visibility=private&status=all&page=22',
            $article->getQuery()
        );
    }
}
