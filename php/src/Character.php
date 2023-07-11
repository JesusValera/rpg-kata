<?php

declare(strict_types=1);

namespace Kata;

final class Character
{
    public function __construct(
        private int $health = 1000,
        private int $level = 1,
        private bool $isAlive = true,
    ) {
    }
}
