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

namespace I\Paket\Job\Entities;

use I\Paket\Requirement\Entities\Requirement;

interface Job
{
    public static function fromArray(array $job): self;

    public function toArray(): array;

    public function getType(): string;

    public function getId(): string;

    public function getRequirement(): Requirement;
}
