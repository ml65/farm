<?php

namespace App\Console\Farm;

use App\Models\Farm\Animal;
use Illuminate\Console\Command;
use App\Models\Farm\Farm as FarmObj;
use App\Models\Farm\Factory\AnimalFactory;
use App\Models\Farm\Service\ProductCollector;

class Farm extends Command
{
    /**
     * @var FarmObj
     */
    private $farm;

    /**
     * @var array []
     */
    private $restr = [
      'Cow'     => 10,
      'Chicken' => 20
    ];
    /**
     * @var string
     */
    protected $signature = 'farm:life';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Запустить ферму';

    /**
     * Execute the console command.
     */
    public function runScenario()
    {
        $animalFactory = new AnimalFactory();
        $productCollector = new ProductCollector();
        $this->farm = new FarmObj($animalFactory, $productCollector);
        $this->initFarm();
        $this->showAnimalType();
        $this->doWeek();

        $this->showProduct();
        $this->farm->addAnimal('Cow');
        for ($i = 0; $i < 5; $i++) {
            $this->farm->addAnimal('Chicken');
        }
        $this->showAnimalType();
        for ($day = 1; $day <= 7; $day++) {
            $this->farm->day();
        }

        $this->showProduct();


        //
    }

    /**
     * @return void
     */
    private function initFarm()
    {
        foreach ($this->restr as $type=>$val) {
            if ($type && $val) {
                for ($i = 0; $i < $val; $i++) {
                    $this->farm->addAnimal($type);
                }
            }
        }
    }

    /**
     * @return void
     */
    public function showAnimalType()
    {
        $reestr = [];
        foreach ($this->farm->getAnimals() as $animal) {
            /* @var $animal Animal */
            $type = $animal->getType();
            if (!isset($reestr[$type])) {
                $reestr[$type] = 0;
            }
            $reestr[$type]++;
        }
        echo "--- Animals ---\n";
        foreach ($reestr as $type => $count) {
            echo $type, "=", $count,"\n";
        }
    }

    /**
     * @return void
     */
    public function showProduct()
    {
        echo "--- Products ---\n";
        foreach ($this->farm->getProducts() as $type => $val) {
            echo $type, "=", $val,"\n";
        }
    }

    private function doWeek()
    {
        for ($day = 1; $day <= 7; $day++) {
            $this->farm->day();
        }
    }
}
