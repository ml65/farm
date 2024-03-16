<?php

namespace App\Models\Farm;

interface AnimalInterface
{
    public function makeProduct();

    function getQuantityOfProduct();

    public function getType();

    public function getProductType();

}
