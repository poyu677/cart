<?php

use poyu\cart\Product;

class ProductTest extends PHPUnit_Framework_TestCase
{
    public function testConstructorSimple()
    {
        $product = new Product("Product", 100, "G");
        $this->assertEquals("Product", $product->getName());
        $this->assertEquals(100, $product->getPrice());
        $this->assertEquals("G", $product->getTag());
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Invalid price
     */
    public function testConstructorPriceException()
    {
        $product = new Product("Product", -10, "G");
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Invalid tag
     */
    public function testConstructorTagException()
    {
        $product = new Product("Product", 100, "A");
    }
}
