<?php

declare(strict_types=1);

namespace Meilisearch\Endpoints\Delegates;

use Meilisearch\Contracts\Http;

trait HandlesMultiSearch
{
    /**
     * @var Http
     */
    protected $http;

    /**
     * @param list<\Meilisearch\Contracts\SearchQuery> $queries
     */
    public function multiSearch(array $queries = [])
    {
        $body = [];

        foreach ($queries as $query) {
            $body[] = $query->toArray();
        }

        return $this->http->post('/multi-search', ['queries' => $body]);
    }
}
