<?php

declare(strict_types=1);

namespace Tests\Exceptions;

use Meilisearch\Exceptions\CommunicationException;
use Tests\TestCase;

final class CommunicationExceptionTest extends TestCase
{
    public function testException(): void
    {
        try {
            throw new CommunicationException('Connection refused');
        } catch (CommunicationException $CommunicationException) {
            self::assertSame('Connection refused', $CommunicationException->getMessage());

            $expectedExceptionToString = 'Meilisearch CommunicationException: Connection refused';
            self::assertSame($expectedExceptionToString, (string) $CommunicationException);
        }
    }
}
