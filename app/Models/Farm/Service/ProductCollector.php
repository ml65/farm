<?php

namespace App\Models\Farm\Service;

use App\Models\Farm\AnimalInterface;

class ProductCollector
{
    /**
     * @var array
     */
    private array $collectedProducts = [];

    /**
     * Сбор продукции с животного
     * @param AnimalInterface $animal
     * @return void
     */
    public function collectProduct(AnimalInterface $animal): void
    {
        $product = $animal->makeProduct();
        $productType = $product['productType'];
        
        if (!isset($this->collectedProducts[$productType])) {
            $this->collectedProducts[$productType] = 0;
        }
        
        $this->collectedProducts[$productType] += $product['value'];
    }

    /**
     * Получение собранной продукции
     * @return array
     */
    public function getCollectedProducts(): array
    {
        return $this->collectedProducts;
    }
} 