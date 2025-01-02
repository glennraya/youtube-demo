<?php

namespace App\Services;

use App\Contracts\ApiClientInterface;

class ExternalApiService
{
    protected ApiClientInterface $api_client;

    public function __construct(ApiClientInterface $api_client)
    {
        $this->api_client = $api_client;
    }

    /**
     * Fetch user data from the external API.
     */
    public function getUserData(string $username)
    {
        return $this->api_client->fetchData($username);
    }
}