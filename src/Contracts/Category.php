<?php

namespace HelpscoutApi\Contracts;

interface Category {

    /**
     * Get id of category
     *
     * @return string
     */
    public function getId();

    /**
     * Get name of category
     *
     * @return string
     */
    public function getName();

}
