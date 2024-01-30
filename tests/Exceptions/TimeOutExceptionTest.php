<?php

declare(strict_types=1);

namespace Tests\Exceptions;

use Meilisearch\Exceptions\TimeOutException;
use Tests\TestCase;

final class TimeOutExceptionTest extends TestCase
{
    public function testException(): void
    {
        $message = 'Timeout';
        $code = 502;

        try {
            throw new TimeOutException($message, $code);
        } catch (TimeOutException $timeOutException) {
            self::assertSame($message, $timeOutException->getMessage());
            self::assertSame($code, $timeOutException->getCode());

            $expectedExceptionToString = "Meilisearch TimeOutException: Code: {$code} - Message: {$message}";
            self::assertSame($expectedExceptionToString, (string) $timeOutException);
        }
    }

    public function testExceptionWithNullMessageAndCode(): void
    {
        $message = 'Request timed out';
        $code = 408;

        try {
            throw new TimeOutException();
        } catch (TimeOutException $timeOutException) {
            self::assertSame($message, $timeOutException->getMessage());
            self::assertSame($code, $timeOutException->getCode());

            $expectedExceptionToString = "Meilisearch TimeOutException: Code: {$code} - Message: {$message}";
            self::assertSame($expectedExceptionToString, (string) $timeOutException);
        }
    }

    public function testExceptionWithEmptyMessage(): void
    {
        try {
            throw new TimeOutException('');
        } catch (TimeOutException $timeOutException) {
            self::assertSame('', $timeOutException->getMessage());

            $expectedExceptionToString = 'Meilisearch TimeOutException: Code: 408';
            self::assertSame($expectedExceptionToString, (string) $timeOutException);
        }
    }
}
