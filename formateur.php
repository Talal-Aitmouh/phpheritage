<?php
// Including the "Employee" class
include "employee.php";

// Definition of the "Trainer" class that extends "Employee"
class Trainer extends Employee {
    private $fixedSalary; // Fixed salary of the trainer
    private $level;       // Level of the trainer

    // Class constructor
    public function __construct($employeeNumber, $lastName, $firstName, $overtimeHours, $hourlyRate, $fixedSalary, $level) {
        // Calling the constructor of the parent class with appropriate parameters
        parent::__construct($employeeNumber, $lastName, $firstName, $overtimeHours, $hourlyRate);
        $this->fixedSalary = $fixedSalary;
        $this->level = $level;
    }

    // Magic method to get the value of a property
    public function __get($attribute)
    {
        // Check the existence of the property and return its value
        return property_exists($this, $attribute) ? $this->$attribute : null;
    }

    // Magic method to set the value of a property
    public function __set($attribute, $value)
    {
        // Check the existence of the property and set its value
        if (property_exists($this, $attribute)) {
            $this->$attribute = $value;
        }
    }

    // Method to calculate the salary of the trainer
    public function calculateSalary(){
        // Assign the hourly wage based on the level (Note: diplome property is not defined in Trainer class)
        if ($this->level == "1st Grade") {
            $this->hourlyRate = 120;
        } elseif ($this->level == "2nd Grade") {
            $this->hourlyRate = 90;
        } elseif ($this->level == "3rd Grade") {
            $this->hourlyRate = 60;
        } else {
            $this->hourlyRate = 40;
        }

        // Calculate the total salary based on overtime hours
        $totalSalary = $this->hourlyRate * $this->overtimeHours + $this->fixedSalary;
        return $totalSalary;
    }
}

// Unit test commented
// Uncomment and modify values for testing
// $t1 = new Trainer(120,"Smith","John",20,40,6000,"3rd Grade");
// echo $t1->fixedSalary;
?>
