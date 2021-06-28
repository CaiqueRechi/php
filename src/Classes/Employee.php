<?php

namespace App\Classes;
use App\Classes\Role;
use App\Classes\Office_;

Class Employee

{
    public string $employee_id;
    public string $name;
    public Role $role_id;  
    public Office $office_id;  

    public function __construct(string $employee_id, string $name, int $role_id, int $office_id)
    {
        $this->emplyee_id = $employee_id;
        $this->name = $name;
        $this->role_id = $role_id;
        $this->office_id = $office_id;
    }
}