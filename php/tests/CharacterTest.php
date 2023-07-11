<?php

declare(strict_types=1);

namespace KataTests;

use Kata\Character;
use PHPUnit\Framework\TestCase;

final class CharacterTest extends TestCase
{
    /** @test */
    public function it_creates_a_default_character_with_values(): void
    {
        $defaultCharacter = new Character();
        $character = new Character(health: 1000, level: 1, isAlive: true);

        self::assertEquals($defaultCharacter, $character);
    }
}
