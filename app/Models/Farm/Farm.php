<?php

namespace App\Models\Farm;

use App\Models\Farm\Factory\AnimalFactory;
use App\Models\Farm\Service\ProductCollector;

class Farm
{
    /**
     * @var array AnimalInterface[]
     */
    private array $animals = [];
    
    /**
     * @var AnimalFactory
     */
    private AnimalFactory $animalFactory;
    
    /**
     * @var ProductCollector
     */
    private ProductCollector $productCollector;

    public function __construct(AnimalFactory $animalFactory, ProductCollector $productCollector)
    {
        $this->animalFactory = $animalFactory;
        $this->productCollector = $productCollector;
    }

    /**
     * Добавление животного на ферму
     * @param string $animalType
     * @return void
     */
    public function addAnimal(string $animalType): void
    {
        try {
            $animal = $this->animalFactory->createAnimal($animalType);
            $this->animals[] = $animal;
        } catch (\Exception $e) {
            echo "Ошибка при создании животного: " . $e->getMessage() . "\n";
        }
    }

    /**
     * Симуляция одного дня на ферме
     * @return void
     */
    public function day(): void
    {
        foreach ($this->animals as $animal) {
            $this->productCollector->collectProduct($animal);
        }
    }

    /**
     * Получение списка животных
     * @return array
     */
    public function getAnimals(): array
    {
        return $this->animals;
    }

    /**
     * Получение собранной продукции
     * @return array
     */
    public function getProducts(): array
    {
        return $this->productCollector->getCollectedProducts();
    }
}
