<?php

namespace App\Classes;

use App\Classes\Brand;
use App\Interfaces\ProductInterface;
use App\Traits\ProductResponse;

class Product implements ProductInterface
{
    use ProductResponse;

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
        $this->getName();

        return $infos;
    }
}