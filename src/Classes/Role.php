<?php

namespace App\Classes;

Class Role
{
    public int $role_id;
    public string $role_name;
    public int $transactions;

    public function __construct(int $role_id, string $role_name, int $transactions)
    {
        $this->role_id = $role_id;
        $this->role_name = $role_name;
        $this->transactions = $transactions;
    }

}