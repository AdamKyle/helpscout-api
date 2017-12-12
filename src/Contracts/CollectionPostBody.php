<?php

namespace HelpscoutApi\Contracts;
use HelpscoutApi\Contracts\Site;

/**
 * An collection interface for creating only the required fields.
 *
 * @link https://developer.helpscout.com/docs-api/collection/create/
 */
interface CollectionPostBody {

  /**
   * Set the site ID the collection belongs to.
   *
   * @param Site
   */
  public function siteId(Site $site);

  /**
   * Set the name of the collection
   *
   * @param String
   */
  public function name(string $name);

  /**
   * Create the JSON aspect of the post body.
   *
   * ```php
   * {
   *   siteId: 'xxxx',
   *   name: 'sample',
   * }
   * ````
   *
   * @return JSON
   */
  public function createPostBody();
}
