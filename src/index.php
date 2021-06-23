<?php
 
require(__DIR__ . "/../vendor/autoload.php");

use App\Classes\Brand;
use App\Classes\Product;

$brand = new Brand('motorola', '5462158436');

$product = new Product('moto G 100', 5255.99, 19, $brand);

echo $product->getInfos();