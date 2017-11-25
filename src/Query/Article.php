<?php

namespace HelpscoutApi\Query;

use HelpscoutApi\Contracts\Collection;
use HelpscoutApi\Contracts\Site;

/**
 * Used to build a query for the article search
 *
 * @link https://developer.helpscout.com/docs-api/articles/search/
 */
class Article {

    /**
     * The params for the article search
     */
    private $params = [];

    public function __construct() {
        $this->createQuery();
    }

    /**
     * Create a query
     *
     * `?query=''` is string related to the article search.
     *
     * @param String
     * @link https://developer.helpscout.com/docs-api/articles/search/
     */
    public function createQuery(String $query='*') {
        $this->params['query'] = $query;
    }

    /**
     * Sets the page for the url param
     *
     * Takes in a string.
     *
     * @param String
     */
    public function setPage(String $page='1') {
        $this->params['page'] = $page;
    }

    /**
     * Sets the collectionID for the url param
     *
     * @param Collection
     */
    public function setCollectionId(Collection $collection) {
        $this->params['collectionId'] = $collection->getId();
    }

    /**
     * Sets the siteId for the url param
     *
     * @param Site
     */
    public function setSiteId(Site $site) {
        $this->params['siteId'] = $site->getId();
    }

    /**
     * Sets the status for the url param
     *
     * Accepted statuses are: `all`, `published` and `notpublished`
     *
     * We default to `all` if we don't match on anything.
     *
     * @param String
     */
    public function setStatus(String $status) {
        switch ($status) {
            case 'all':
                $this->params['status'] = $status;
                break;
            case 'published':
                $this->params['status'] = $status;
                break;
            case 'notpublished':
                $this->params['status'] = $status;
                break;
            default:
                $this->params['status'] = 'all';
        }
    }

    /**
     * Sets the visibility for the url param
     *
     * Accepted statuses are: `all`, `public` and `private`
     *
     * We default to `all` if we don't match on anything.
     *
     * @param String
     */
    public function setVisibility(String $visibility) {
        switch ($visibility) {
            case 'all':
                $this->params['visibility'] = $visibility;
                break;
            case 'public':
                $this->params['visibility'] = $visibility;
                break;
            case 'private':
                $this->params['visibility'] = $visibility;
                break;
            default:
                $this->params['visibility'] = 'all';
        }
    }

    /**
     * Builds and returns the query for the search endpoint
     *
     * @return String
     */
    public function getQuery() {
        $query = '?';
        $queryArray = [];

        if (count($this->params) > 1) {
            // Creates: ?key=value& ...
            forEach($this->params as $key => $value) {
                $queryArray[] = $key . '=' . $value;
            }

            $query .= implode('&', $queryArray);
        } else {
            // Creates: ?key=value
            $key = key($this->params);
            $query .=  $key . '=' . $this->params[$key];
        }

        return $query;
    }
}
