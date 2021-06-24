<?php

namespace App\Classes;

Class Section
{
    public int $section_id;
    public string $section_name;
    public Office $office_id;

    public function __construct(int $section_id, string $section_name, Office $office_id)
    {
        $this->section_id = $section_id;
        $this->section_name = $section_name;
        $this->office_id = $office_id;
    }
}