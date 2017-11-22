<?php

namespace HelpscoutApi\Contracts;

interface Collection {

    /**
     * Get id of collection
     *
     * @return string
     */
    public function getId();

    /**
     * Get name of collection
     *
     * @return string
     */
    public function getName();

}
