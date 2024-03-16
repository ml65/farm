<?php

namespace App\Console\Farm;

use App\Models\Farm\Animal;
use Illuminate\Console\Command;
use App\Models\Farm\Farm as FarmObj;

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
    protected $signature = 'farm:run';

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
        $this->farm = new FarmObj();
        $this->initFarm();
        $this->showAnimalType();
        for ($day = 1; $day <= 7; $day++) {
            $this->farm->day();
        }

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
        foreach ($this->farm->animals as $animal) {
            /* @var $animal Animal */
            $type = $animal->getType();
            if (!isset($reestr[$type])) {
                $reestr[$type] = 0;
            }
            $reestr[$type]++;
        }
        echo "--- Животные на ферме ---\n";
        foreach ($reestr as $type => $count) {
            echo $type, "=", $count,"\n";
        }
    }

    /**
     * @return void
     */
    public function showProduct()
    {
        $reestr = [];
        echo "--- Количество произведенных продуктов---\n";
        foreach ($this->farm->product as $type => $val) {
            echo $type, "=", $val,"\n";
        }
    }
}
