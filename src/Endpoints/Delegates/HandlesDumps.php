<?php

declare(strict_types=1);

namespace Meilisearch\Endpoints\Delegates;

use Meilisearch\Endpoints\Dumps;

trait HandlesDumps
{
    /**
     * @var Dumps
     */
    protected $dumps;

    public function createDump(): array
    {
        return $this->dumps->create();
    }
}
