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

    /** @test */
    public function it_decrease_health_when_character_attack(): void
    {
        $attacker = new Character();
        $victim = new Character(health: 1000);

        $attacker->attack($victim, 50);

        $victimAfterAttack = new Character(health: 950);
        self::assertEquals($victimAfterAttack, $victim);
    }

    /** @test */
    public function it_cannot_have_negative_health(): void
    {
        $attacker = new Character();
        $victim = new Character(health: 1000);

        $attacker->attack($victim, 1001);

        $victimAfterAttack = new Character(health: 0);
        self::assertEquals($victimAfterAttack, $victim);
    }
}
