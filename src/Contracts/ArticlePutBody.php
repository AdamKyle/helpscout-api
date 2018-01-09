<?php

namespace HelpscoutApi\Contracts;

use HelpscoutApi\Contracts\ArticlePostBody;

/**
 * An Article interface for creating only the required fields.
 *
 * @link https://developer.helpscout.com/docs-api/articles/update/
 */
interface ArticlePutBody {

    /**
     * Set the article id.
     *
     * @param string
     */
    public function id(string $articleId);

    /**
     * Returns the article id.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Sets the article post body.
     *
     * @param ArticlePostBody
     */
    public function articlePostBody(ArticlePostBody $articlePostBody);

    /**
    * Create the JSON aspect of the put body.
    *
    * ```php
    * {
    *   collectionId: 'xxxx',
    *   name: 'sample',
    *   text: 'Some text here ...',
    * }
    * ````
    *
    * @return \stdClass
    */
    public function createPutBody();
}
