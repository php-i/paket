<?php

/*
 * This file is part of PHP I: Paket.
 *
 * (c) Anton Komarev <anton@komarev.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace I\Paket\Job\Repositories;

use I\Paket\Job\Entities\Job as JobEntity;

interface Job
{
    public function all(): iterable;

    public function getById(string $id): JobEntity;

    public function store(JobEntity $job): void;

    public function changeJobStatus(JobEntity $job, string $statusName): void;

    public function changeJobExitCode(JobEntity $job, int $exitCode): void;
}
