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
        $character = new Character(health: 1000, level: 1);

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

    /** @test */
    public function it_can_heal_another_character(): void
    {
        $doctor = new Character();
        $patient = new Character(health: 900);

        $doctor->heal($patient, 50);

        $patientAfterHealed = new Character(health: 950);
        self::assertEquals($patientAfterHealed, $patient);
    }

    /** @test */
    public function it_cannot_heal_dead_character(): void
    {
        $doctor = new Character();
        $deadCharacter = new Character(health: 0);

        $doctor->heal($deadCharacter, 50);

        $deadAfterCharacter = new Character(health: 0);
        self::assertEquals($deadAfterCharacter, $deadCharacter);
    }
}
