<?php

namespace HelpscoutApi\Contracts;

interface Category {

    /**
     * Get id of category
     *
     * @return string
     */
    public function getId(): string;

    /**
     * get number of Category
     *
     * @return string
     */
    public function getNumber(): string;

}
