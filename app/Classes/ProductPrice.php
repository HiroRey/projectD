<?php


namespace App\Classes;


class ProductPrice
{

    private $order;

    public function price()
    {
        $price = 1000;

        $newPrice = $price * 3;

        return $newPrice;
    }

}
