<?php

declare(strict_types=1);

namespace Meilisearch\Http\Serialize;

class Json implements SerializerInterface
{
    public function serialize($data)
    {
        return json_encode($data);
    }

    public function unserialize(string $string)
    {
        return json_decode($string, true);
    }
}
