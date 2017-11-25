<?php
use PHPUnit\Framework\TestCase;
use HelpscoutApi\Params\Article;

class ArticleParamsTest extends TestCase {

    public function testPageParam() {
        $article = new Article();
        $article->page('5');

        $this->assertEquals('?page=5', $article->getparams());
    }

    public function testStatusParam() {
        $article = new Article();
        $article->status('all');

        $this->assertEquals('?status=all', $article->getparams());
    }

    public function testWrongStatusParam() {
        $article = new Article();
        $article->status('xxxx');

        $this->assertEquals('?status=all', $article->getparams());
    }

    public function testSortParam() {
        $article = new Article();
        $article->sort('number');

        $this->assertEquals('?sort=number', $article->getparams());
    }

    public function testWrongSortParam() {
        $article = new Article();
        $article->sort('xxxx');

        $this->assertEquals('?sort=number', $article->getparams());
    }

    public function testOrderParam() {
        $article = new Article();
        $article->order('asc');

        $this->assertEquals('?order=asc', $article->getparams());
    }

    public function testWrongOrderParam() {
        $article = new Article();
        $article->order('xxxx');

        $this->assertEquals('?order=asc', $article->getparams());
    }

    public function testPageSizeParams() {
        $article = new Article();
        $article->pageSize('10');

        $this->assertEquals('?pageSize=10', $article->getparams());
    }

    public function testToHighPageSizeParam() {
        $article = new Article();
        $article->pageSize('1000000');

        $this->assertEquals('?pageSize=100', $article->getparams());
    }

    public function testMultipleParams() {
        $article = new Article();
        $article->pageSize('10');
        $article->order('desc');
        $article->status('published');

        $this->assertEquals(
            '?pageSize=10&order=desc&status=published',
            $article->getParams()
        );
    }

    public function testMultipleParamsDifferentVersions() {
        $article = new Article();
        $article->pageSize('10');
        $article->pageSize('500');
        $article->order('desc');
        $article->status('published');
        $article->status('notpublished');

        $this->assertEquals(
            '?pageSize=100&order=desc&status=notpublished',
            $article->getParams()
        );
    }
}
