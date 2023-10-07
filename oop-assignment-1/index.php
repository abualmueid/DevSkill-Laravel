<?php 

class Student
{
    private int $id;
    private string $name;
    private string $major;

    private array $students;

    public function addStudent(array $students) : void
    {
        foreach($students as $student)
        {
            $id = $student['id'] ?? uniqid();
            $this->students[$id] = $student;
        }
    }

    public function getStudents() : array 
    {
        return $this->students;
    }

    public function getStudent($id) : array
    {
        return $this->students[$id] ?? []; 
        // return isset($this->students[$id]) ? $this->students[$id] : []; 
        // You don't need foreach loop here. Because it's already there inside isset() method.
    }
}

$students = [
    [
        "id" => 1520730,
        "name" => "Mueid",
        "major" => "CS"
    ],
    [
        "id" => 1621321,
        "name" => "Rasel",
        "major" => "EEE"
    ],
    [
        "id" => 1756669,
        "name" => "Mustafiz",
        "major" => "ETE"
    ]
];

$student = new Student();
$student->addStudent($students);
echo json_encode($student->getStudents());
//echo json_encode($student->getStudent(1756669));

