<?php
// Including the "Employee" class
include "employee.php";

// Definition of the "Contractor" class that extends "Employee"
class Contractor extends Employee
{
    private $qualification; // Qualification of the contractor

    // Class constructor
    public function __construct($employeeNumber, $lastName, $firstName, $overtimeHours, $hourlyRate, $qualification)
    {
        // Calling the constructor of the parent class with appropriate parameters
        parent::__construct($employeeNumber, $lastName, $firstName, $overtimeHours, $hourlyRate);
        $this->qualification = $qualification;
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

    // Method to calculate the salary of the contractor
    public function calculateSalary()
    {
        // Assign the hourly rate based on the qualification grade
        if ($this->qualification == "1st grade") {
            $this->hourlyRate = 120;
        } elseif ($this->qualification == "2nd grade") {
            $this->hourlyRate = 90;
        } elseif ($this->qualification == "3rd grade") {
            $this->hourlyRate = 60;
        } else {
            $this->hourlyRate = 40;
        }

        // Calculate the total salary based on overtime hours
        $totalSalary = $this->hourlyRate * $this->overtimeHours;
        return $totalSalary;
    }
}

// Unit test commented
// $c1 = new Contractor(120, "Smith", "John", 20, 40, "3rd grade");
// echo $c1->calculateSalary();
