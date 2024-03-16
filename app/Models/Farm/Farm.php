<?php

namespace App\Models\Farm;

class Farm extends FarmBase
{
    /**
     * @var array AnimalInterface
     */
    public $animals;
    private $lastId;
    public $product;

    public function __construct()
    {
        $this->lastId = 0;
        $this->product = [];
    }
    /**
     * @param $animalType string
     * @return void
     */
    public function addAnimal($animalType)
    {
        $class = __NAMESPACE__ . '\\' . $animalType;
        $id = $this->lastId++ ?? 0;
        if ( file_exists(__DIR__ . '/'.$animalType .'.php')) {
            $animal = new $class($id);
            $this->animals[] = $animal;
        } else {
            echo "not find class ",$animalType,"\n";
        }
    }

    public function day()
    {
        foreach ($this->animals as $animal) {
            /* @var $animal Animal */
            $param = $animal->makeProduct();
            if (!isset($this->product[$param['productType']])) {
                $this->product[$param['productType']]=0;
            }
            $this->product[$param['productType']] += $param['value'];
        }

    }


}
