<?php

declare(strict_types=1);

namespace Meilisearch\Endpoints\Delegates;

use Meilisearch\Endpoints\Snapshots;

trait HandlesSnapshots
{
    /**
     * @var Snapshots
     */
    protected $snapshots;

    public function createSnapshot(): array
    {
        return $this->snapshots->create();
    }
}
