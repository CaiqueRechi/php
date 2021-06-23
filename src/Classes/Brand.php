<?php

namespace App\Classes;

Class Brand 
{
    public string $name;
    public string $cnpj;


    public function __construct(string $name, string $cnpj)
    {
        $this->name = $name;
        $this->cnpj = $cnpj;
    }
}