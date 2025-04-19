<?php

namespace App\Models\Farm\Factory;

use App\Models\Farm\AnimalInterface;
use App\Models\Farm\Cow;
use App\Models\Farm\Chicken;

class AnimalFactory
{
    private static int $lastId = 0;

    /**
     * Создание животного по типу
     * @param string $animalType
     * @return AnimalInterface
     * @throws \Exception
     */
    public function createAnimal(string $animalType): AnimalInterface
    {
        $id = self::$lastId++;
        
        return match ($animalType) {
            'Cow' => new Cow($id),
            'Chicken' => new Chicken($id),
            default => throw new \Exception("Неизвестный тип животного: $animalType"),
        };
    }
} 