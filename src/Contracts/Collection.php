<?php

namespace HelpscoutApi\Contracts;

interface Collection {

    /**
     * Get id of collection
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Get number of collection
     *
     * @return string
     */
    public function getNumber(): string;

}
