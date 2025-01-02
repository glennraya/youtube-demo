<?php

namespace App\Contracts;

interface ApiClientInterface
{
    /**
     * Fetch data from a given endpoint or resource.
     */
    public function fetchData(string $resource);
}
