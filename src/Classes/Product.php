<?php

namespace App\Classes;

use App\Classes\Brand;

class Product 
{
    public string $name;
    public float $price;
    public int $quantity;
    public Brand $brand;

    public function __construct(string $name, float $price, int $quantity, Brand $brand)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->brand = $brand;
    }

    public function getInfos()
    {
        $infos = "Nome do Produto: {$this->name}<br>";
        $infos .= "valor do produto: {$this->price}<br>";
        $infos .= "quantidade do produto: {$this->quantity}<br>";
        $infos .= "marca do produto: {$this->brand->name}<br>";

        return $infos;
    }
}