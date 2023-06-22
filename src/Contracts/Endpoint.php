<?php

declare(strict_types=1);

namespace Meilisearch\Contracts;

abstract class Endpoint
{
    protected const PATH = '';

    /**
     * @var Http
     */
    protected $http;

    /**
     * @var string|null
     */
    protected $apiKey;

    public function __construct(Http $http, string $apiKey = null)
    {
        $this->http = $http;
        $this->apiKey = $apiKey;
    }

    public function show(): ?array
    {
        return $this->http->get(static::PATH);
    }
}
