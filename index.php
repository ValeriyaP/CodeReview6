<?php

declare(strict_types=1);

class DndCharacter
{
    public $strength;
    public $dexterity;
    public $constitution;
    public $intelligence;
    public $wisdom;
    public $charisma;

    public $hitpoints;

    public function __construct()
    {
        $this->generate();
        $this->hitpoints = 10 + $this->modifier();
    }

    public function generate(): void
    {
        $params = [
            'strength',
            'dexterity',
            'constitution',
            'intelligence',
            'wisdom',
            'charisma'
        ];

        foreach ($params as $attr) {
            $points = [];
            for ($i = 0; $i <= 3; $i++) {
                $points[] = rand(1, 6);
            }
            arsort($points);
            $this->{$attr} = $points[0] + $points[1] + $points[2];
        }
    }

    public function modifier(): int
    {
        return (int)floor(($this->constitution - 10) * 0.5);
    }

    public function show(): void
    {
        echo "strength={$this->strength}<br>
        dexterity={$this->dexterity}<br>
        constitution={$this->constitution}<br>
        intelligence={$this->intelligence}<br>
        wisdom={$this->wisdom}<br>
        charisma={$this->charisma}<br>
        constitution={$this->constitution}<br>
        hitpoints={$this->hitpoints}";
    }
}

$character = new DndCharacter();
$character->show();
