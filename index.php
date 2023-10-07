<?php

class Parents 
{

}

class Student extends Parents
{
    private $id;
    private $name;
    private $class;
    private $students;
    
    public function addStudent(array $students) : void
    {
        
    }

    public function getStudentById($id)
    {
        
    }
}

$student = new Student();
