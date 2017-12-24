<?php

namespace HelpscoutApi\Contracts;
use HelpscoutApi\Contracts\Collection;

/**
 * An Category interface for creating only the required fields.
 *
 * @link https://developer.helpscout.com/docs-api/categories/create/
 */
interface CategoryPostBody {

  /**
   * Set the collection ID the category belongs to.
   *
   * @param Collection
   */
  public function collectionId(Collection $collection);

  /**
   * Set the name of the category
   *
   * @param String
   */
  public function name(string $name);

  /**
   * Create the JSON aspect of the post body.
   *
   * ```php
   * {
   *   collectionId: 'xxxx',
   *   name: 'sample',
   * }
   * ````
   *
   * @return \stdClass
   */
  public function createPostBody();
}
