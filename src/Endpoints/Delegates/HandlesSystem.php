<?php

declare(strict_types=1);

namespace Meilisearch\Endpoints\Delegates;

use Meilisearch\Endpoints\Health;
use Meilisearch\Endpoints\Stats;
use Meilisearch\Endpoints\TenantToken;
use Meilisearch\Endpoints\Version;

trait HandlesSystem
{
    /**
     * @var Health
     */
    protected $health;

    /**
     * @var Version
     */
    protected $version;

    /**
     * @var TenantToken
     */
    protected $tenantToken;

    /**
     * @var Stats
     */
    protected $stats;

    public function health(): ?array
    {
        return $this->health->show();
    }

    public function isHealthy(): bool
    {
        try {
            $this->health->show();
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

    public function version(): array
    {
        return $this->version->show();
    }

    public function stats(): array
    {
        return $this->stats->show();
    }

    public function generateTenantToken(string $apiKeyUid, $searchRules, array $options = []): string
    {
        return $this->tenantToken->generateTenantToken($apiKeyUid, $searchRules, $options);
    }

    public function swapIndexes(array $indexes): array
    {
        $options = array_map(static function ($data) {
            return ['indexes' => $data];
        }, $indexes);

        return $this->index->swapIndexes($options);
    }
}
