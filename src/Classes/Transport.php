<?php

namespace App\Classes;

Class Transport
{
    public int $cargo_id;
    public Employee $employee_id;
    public int $cargo_capacity;

    public function __construct(int $cargo_id, int $employee_id, $cargo_capacity)
    {
        $this->cargo_id = $cargo_id;
        $this->employee_id = $employee_id;
        $this->cargo_capacity = $cargo_capacity;     
    }
}