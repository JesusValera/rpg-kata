<?php

declare(strict_types=1);

namespace Kata;

final class Character
{
    public function __construct(
        private int $health = 1000,
        private int $level = 1,
    ) {
    }

    public function attack(Character $character, int $damage): void
    {
        if ($character->health < $damage) {
            $character->health = 0;
            return;
        }

        $character->health -= $damage;
    }

    public function heal(Character $patient, int $healthPoints): void
    {
        if ($patient->isDead()) {
            return;
        }

        $patient->health += $healthPoints;
    }

    private function isDead(): bool
    {
        return $this->health === 0;
    }
}
