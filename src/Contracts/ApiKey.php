<?php

namespace HelpscoutApi\Contracts;

interface ApiKey {

    /**
     * Returns the api key
     *
     * @return string
     */
    public function getKey(): string;
}
