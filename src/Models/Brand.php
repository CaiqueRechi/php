<?php

namespace App\Models;

use App\Models\Model;

class Brand extends Model
{
    private $table = 'brands';

    public string $name;
    public string $cnpj;

    public function save(int $id = null)
    {
        if(!$id) {
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
        } else {
            try {
                $value = $this->update(
                    $this->table,
                    $id,
                    "name = '$this->name', cnpj = '$this->cnpj'"
                );
    
                return $value;
            } catch (\Exception $e) {
                return false;
            }
        }
    }

    public function destroy($id) {
        try {
        
            $date = date('Y-m-d H:i:s');
            $value = $this->update(
                $this->table,
                $id,
                "deleted_at = '$date', deleted_by = 1"
            );

            return $value;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function forceDestroy() {
        return $this->delete($this->table, $id);
    }

    public function getAll()
    {
        return $this->get($this->table);
    }
}
