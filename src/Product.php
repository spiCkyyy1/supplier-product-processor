<?php

class Product
{
    public $make;
    public $model;
    public $colour;
    public $capacity;
    public $network;
    public $grade;
    public $condition;

    public function __construct($make, $model, $colour = null, $capacity = null, $network = null, $grade = null, $condition = null)
    {
        if (!$make || !$model) {
            throw new ProductException('Make and Model are required fields');
        }
        $this->make = $make;
        $this->model = $model;
        $this->colour = $colour;
        $this->capacity = $capacity;
        $this->network = $network;
        $this->grade = $grade;
        $this->condition = $condition;
    }
    
    public function __toString()
    {
        return json_encode([
            'make' => $this->make,
            'model' => $this->model,
            'colour' => $this->colour,
            'capacity' => $this->capacity,
            'network' => $this->network,
            'grade' => $this->grade,
            'condition' => $this->condition,
        ]);
    }
}