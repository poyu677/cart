<?php

use poyu\cart\Cart;
use poyu\cart\Product;

class CartTest extends PHPUnit_Framework_TestCase
{
    private $products = null;
    private $cart = null;

    public function setUp()
    {
        //set up products...
        $this->products = array(
            new Product("R1", 100, "R"),
            new Product("R2", 200, "R"),
            new Product("G1", 150, "G"),
            new Product("G2", 250, "G")
        );

        $this->cart = new Cart();
    }

    public function tearDown()
    {
        $this->products = null;
        $this->cart = null;
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Product cannot be paired
     */
    public function testInvalidPair()
    {
        $this->cart->addProduct($this->products[0]);
        $this->cart->checkout();
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Product cannot be paired
     */
    public function testInvalidPair2()
    {
        $this->cart->addProduct($this->products[0]);
        $this->cart->addProduct($this->products[1]);
        $this->cart->checkout();
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Product cannot be paired
     */
    public function testInvalidPair3()
    {
        $this->cart->addProduct($this->products[0]);
        $this->cart->addProduct($this->products[1]);
        $this->cart->addProduct($this->products[2]);
        $this->cart->checkout();
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Product cannot be paired
     */
    public function testInvalidPair4()
    {
        $this->cart->addProduct($this->products[0]);
        $this->cart->addProduct($this->products[0]);
        $this->cart->checkout();
    }

    public function testValidPairAndTotal()
    {
        $this->cart->addProduct($this->products[0]);
        $this->cart->addProduct($this->products[2]);
        
        $this->assertEquals(true, $this->cart->checkout());
        $this->assertEquals(
            (int)((100 + 150)*0.75),
            $this->cart->getTotal()
        );
    }
    
    public function testValidPairAndTotal2()
    {
        $this->cart->addProduct($this->products[0]);
        $this->cart->addProduct($this->products[1]);
        $this->cart->addProduct($this->products[2]);
        $this->cart->addProduct($this->products[3]);
        
        $this->assertEquals(true, $this->cart->checkout());
        $this->assertEquals(
            (int)((100 + 200 + 150 + 250)*0.75),
            $this->cart->getTotal()
        );
    }
}
