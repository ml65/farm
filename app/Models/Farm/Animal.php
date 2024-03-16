<?php

namespace App\Models\Farm;

class Animal extends FarmBase implements AnimalInterface
{

    protected $id;
    protected $type;
    protected const PROD_MAX = 12;
    protected const PROD_MIN = 0;
    protected $prodType;

    /**
     * @param int $id 
     */
    public function __construct( int $id)
    {
        if ($id) {
            $this->id = $id;
        }
    }

    /**
     * @return array
     */
    public function makeProduct()
    {
        return ['productType' => $this->prodType, 'value' => $this->getQuantityOfProduct()];
    }

    /**
     * @return int
     */
    function getQuantityOfProduct()
    {
        return rand(self::PROD_MIN,self::PROD_MAX);

    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getProductType()
    {
        return $this->prodType;

    }

}
