<?php

// Abstract class definition for "Employee"
abstract class Employee
{
    // Protected class properties
    protected $employeeNumber;      // Employee's number
    protected $lastName;            // Employee's last name
    protected $firstName;           // Employee's first name
    protected $overtimeHours;       // Employee's overtime hours
    protected $hourlyRate;          // Employee's hourly wage

    // Class constructor
    public function __construct($employeeNumber, $lastName, $firstName, $overtimeHours, $hourlyRate)
    {
        // Initialize properties with provided values
        $this->employeeNumber = $employeeNumber;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->overtimeHours = $overtimeHours;
        $this->hourlyRate = $hourlyRate;
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

    // Magic method to get a string representation of the object
    public function __toString()
    {
        return $this->employeeNumber . '-' . $this->lastName  . ' ' . $this->firstName;
    }

    // Abstract method to calculate the salary (must be implemented in child classes)
    abstract public function calculateSalary();
}
