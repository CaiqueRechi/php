<?php

namespace App\Classes;
use App\Classes\Employee;

Class Transport
{
    public int $id;
    public Employee $employee;
    public int $capacity;

    public function __construct(int $id, Employee $employee,int $capacity)
    {
        $this->id = $id;
        $this->employee = $Employee;
        $this->cargo_capacity = $cargo_capacity;     
    }
}