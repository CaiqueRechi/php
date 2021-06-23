<?php

namespace App\Classes;

Class Office
{

    public string $cnpj;
    public string $name;
    public string $zip;
    public int $office_id;

    public function __construct(string $cnpj, string $name, string $zip, int $id)

    {
        $this->cnpj = $cnpj;
        $this->name = $name;
        $this->zip = $zip;
        $this->office_id = $id;
    }

}