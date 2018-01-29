<?php

namespace HelpscoutApi\Params;

use HelpscoutApi\Params\Base;

/**
 * Article paramters for returning a list of articles
 */
class Article extends Base {

    /**
     * Set the status
     *
     * We accept `all`, `published` and `nopublished`
     *
     * The default is `all`
     *
     * @param String
     */
    public function status(String $status) {
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
}
