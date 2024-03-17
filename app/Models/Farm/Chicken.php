<?php

namespace App\Models\Farm;

use App\Models\Farm\Animal;

class Chicken extends Animal
{
    public const TYPE = 'Chicken';
    protected const PROD_MAX = 0;
    protected const PROD_MIN = 1;
    protected const PROD_TYPE = 'egg';

    function __construct(int $id) {
        parent::__construct($id);
        $this->setType(self::TYPE);
        $this->setProdType(self::PROD_TYPE);
    }

}
