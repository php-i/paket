<?php

/*
 * This file is part of PHP Contracts: Paket.
 *
 * (c) Anton Komarev <anton@komarev.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace I\Paket\Job\Exceptions;

use I\Paket\Exceptions\PaketThrowable;
use I\Paket\Job\Entities\Job;
use RuntimeException;
use Throwable;

final class JobFailed extends RuntimeException implements
    PaketThrowable
{
    private $job;

    private $exitCode = 0;

    public function __construct(
        Job $job,
        int $exitCode,
        string $message = '',
        int $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);

        $this->job = $job;
        $this->exitCode = $exitCode;
    }

    public static function withExitCode(Job $job, int $code): self
    {
        return new self($job, $code, sprintf('Job `%s` failed. Exit code: %d', $job->getId(), $code));
    }

    public function getJob(): Job
    {
        return $this->job;
    }

    public function getExitCode(): int
    {
        return $this->exitCode;
    }
}
