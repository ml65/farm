<?php

namespace App\Models\Farm;

use App\Models\Farm\Animal;

class Cow extends Animal
{
    public const TYPE        = 'Cow';
    protected const PROD_MAX = 12;
    protected const PROD_MIN = 8;
    protected const PROD_TYPE = 'milk';

    function __construct(int $id) {
        parent::__construct($id);
        $this->type = self::TYPE;
        $this->prodType = self::PROD_TYPE;
    }

}
