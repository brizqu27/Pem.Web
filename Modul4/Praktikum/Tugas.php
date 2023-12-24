<?php

namespace Tugas;

// Trait
trait GreetingTrait {
    public function sayHello() {
        echo "Hello, ";
    }
}

// Abstract class
abstract class Person {
    protected $name;
    protected $age;

    // Constructor
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    // Abstract method
    abstract public function introduceYourself();
}

// Class inheritance
class Student extends Person {
    use GreetingTrait; // Using trait

    private $studentId;

    // Constructor
    public function __construct($name, $age, $studentId) {
        parent::__construct($name, $age);
        $this->studentId = $studentId;
    }

    // Overriding abstract method
    public function introduceYourself() {
        $this->sayHello();
        echo "I am a student named {$this->name}, ";
        echo "age {$this->age}, student ID: {$this->studentId}.\n";
    }
}

class Teacher extends Person {
    use GreetingTrait; // Using trait

    private $employeeId;

    // Constructor
    public function __construct($name, $age, $employeeId) {
        parent::__construct($name, $age);
        $this->employeeId = $employeeId;
    }

    // Overriding abstract method
    public function introduceYourself() {
        $this->sayHello();
        echo "I am a teacher named {$this->name}, ";
        echo "age {$this->age}, employee ID: {$this->employeeId}.\n";
    }
}

// Creating objects
$student = new Student("John Doe", 20, "S12345");
$teacher = new Teacher("Mrs. Smith", 35, "T98765");

// Calling methods
$student->introduceYourself();
$teacher->introduceYourself();
