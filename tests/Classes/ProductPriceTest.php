<?php

namespace Tests\Classes;

use App\Classes\ProductPrice;
use PHPUnit\Framework\TestCase;

class ProductPriceTest extends TestCase
{

    public function testPrice()
    {
        $expected = 3000;
        $price = new ProductPrice();
        $this->assertEquals($expected, $price->price(), "Test return $expected");
    }
}
