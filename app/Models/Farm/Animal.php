<?php

namespace App\Models\Farm;

class Animal  implements AnimalInterface
{
    protected $id;
    protected $type;
    protected $prodType;

    protected const PROD_MAX = 12;
    protected const PROD_MIN = 0;

    /**
     * @param int $id
     */
    public function __construct( int $id)
    {
        $this->id = $id;
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

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getProdType()
    {
        return $this->prodType;
    }

    public function setProdType($prodtype)
    {
        $this->prodType = $prodtype;
    }


}
