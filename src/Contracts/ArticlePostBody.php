<?php

namespace HelpscoutApi\Contracts;

/**
 * An Article interface for creating only the required fields.
 *
 * @link https://developer.helpscout.com/docs-api/articles/create/
 */
interface ArticlePostBody {

  /**
   * Set the collection ID the aerticle belongs to.
   *
   * @param String
   */
  public function collectionID(String $collectionId);

  /**
   * Set the name of the aerticle.
   *
   * @param String
   */
  public function name(String $name);

  /**
   * Set the text of the aerticle.
   *
   * @param String
   */
  public function text(String $text);

  /**
   * Create the JSON aspect of the post body.
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
  public function createPostBody();
}
