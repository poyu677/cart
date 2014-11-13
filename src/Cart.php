<?php

namespace poyu\cart;

use poyu\cart\Product;

class Cart
{
    private $greenProduct = null;
    private $redProduct = null;
    private $total = 0;

    public function __construct()
    {
        $this->greenProduct = array();
        $this->redProduct = array();
    }

    public function addProduct(Product $p)
    {
        if ($p->getTag() === "G") {
            $this->greenProduct []= $p;
        } elseif ($p->getTag() === "R"){
            $this->redProduct []= $p;
        }
    }

    public function checkout()
    {
        if (sizeof($this->greenProduct) !== sizeof($this->redProduct)) {
            throw new \Exception("Product cannot be paired");
        }
        
        $total = 0;
        foreach ($this->greenProduct as $p) {
            $total += $p->getPrice();
        }
        foreach ($this->redProduct as $p) {
            $total += $p->getPrice();
        }
        $this->total = (int)($total*0.75);
    
        return true;
    }

    public function getTotal()
    {
        return $this->total;
    }
}
