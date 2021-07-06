<?php

namespace App\Models;

use App\Models\Model;

class Brand extends Model
{
    private $table = 'brands';

    public string $name;
    public string $cnpj;

    public function save()
    {
        try {
            $value = $this->insert(
                $this->table,
                "name, cnpj",
                "'$this->name', '$this->cnpj'"
            );

            return $value;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getAll()
    {
        return $this->get($this->table);
    }
}
