<?php

namespace HelpscoutApi\Params;

/**
 * Core Params that can be used and shared with end point specific params
 */
class Base {

    /**
     * Array of params
     */
    protected $params = [];

    /**
     * Set the page number
     *
     * @param String
     */
    public function page(String $page) {
        $this->params['page'] = $page;
    }

    /**
     * Set the status
     *
     * We accept `number`, `status`, `name`, `popularity`, `createdAt`
     * and `updatedAt`
     *
     * The default is `number`
     *
     * @param String
     */
    public function sort(String $sort) {
        switch ($sort) {
            case 'number':
                $this->params['sort'] = $sort;
                break;
            case 'status':
                $this->params['sort'] = $sort;
                break;
            case 'name':
                $this->params['sort'] = $sort;
                break;
            case 'popularity':
                $this->params['sort'] = $sort;
                break;
            case 'createdAt':
                $this->params['sort'] = $sort;
                break;
            case 'updateAt':
                $this->params['sort'] = $sort;
                break;
            default:
                $this->params['sort'] = 'number';
        }
    }

    /**
     * Set the order of the returned results
     *
     * We accept `asc` and `desc` with the default of `asc`
     *
     * @param String
     */
    public function order(string $order) {
        switch ($order) {
            case 'asc':
                $this->params['order'] = $order;
                break;
            case 'desc':
                $this->params['order'] = $order;
                break;
            default:
                $this->params['order'] = 'asc';
        }
    }

    /**
     * Set the page size.
     *
     * The maximum is 100.
     *
     * @param Integer
     */
    public function pageSize(int $pageSize) {
        if ($pageSize > 100) {
            $this->params['pageSize'] = '100';
        } else {
            $this->params['pageSize'] = (string)$pageSize;
        }
    }

    /**
     * Build the query for the params we can pass.
     *
     * For example `?pageSize=20&sort=number`
     *
     * @return String
     */
    public function getParams() {
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
