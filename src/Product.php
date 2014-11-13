<?php

namespace poyu\cart;

class Product
{
    private $name = "";
    private $price = 0;
    private $tag = "";

    public function __construct($name, $price, $tag)
    {
        //check price
        if (!is_int($price) or $price < 0) {
            throw new \Exception("Invalid price");
        }

        //check tag : invalid tag only consists og G, R
        if ($tag !== "G" and $tag !== "R") {
            throw new \Exception("Invalid tag");
        }

        $this->name = $name;
        $this->price = $price;
        $this->tag = $tag;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getTag()
    {
        return $this->tag;
    }
}
