<?php 

trait StudentPayment
{
    private array $studentPayments;

    public function addPayment($id, $amount) : void
    {
        $this->studentPayments[$id] = $amount;
    }

    public function getPayment($id) : int | float
    {
        return $this->studentPayments[$id];
    }
}

class Parents
{
    protected array $parents;

    public function addParents($id, array $parents) : void
    {
        $this->parents[$id] = $parents;
    }

    public function getParents() : array
    {
        return $this->parents;
    }

    public function getParent($id) : array
    {
        return $this->parents[$id] ?? [];
    }
}

class Student extends Parents
{
    use StudentPayment;

    private array $students;

    public function addStudent(array $students) : void
    {
        foreach($students as $student)
        {
            $id = $student['id'] ?? uniqid();
            $this->students[$id] = $student;

            // adding parents here
            // $this->students[$id] = $this->getParent($id);
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
echo json_encode($student->getStudent(1756669));

// You can create $parents array but then you need to create array of id's also.
/*
$parents = [
    [
        "fatherName" => "Abu Bakar Siddique",
        "motherName" => "Monowara Begum"
    ],
    [
        "fatherName" => "Shorof Mahmud",
        "motherName" => "Anika Khatun"
    ],
    [
        "fatherName" => "Sadekur Rahman",
        "motherName" => "Bornali Begum"
    ]
];
*/

$student->addParents(1520730, [
    "fatherName" => "Abu Bakar Siddique",
    "motherName" => "Monowara Begum",
]);

$student->addParents(1621321, [
    "fatherName" => "Shorof Mahmud",
    "motherName" => "Anika Khatun"
]);

$student->addParents(1756669, [
    "fatherName" => "Sadekur Rahman",
    "motherName" => "Bornali Begum"
]);

echo json_encode($student->getParents());
echo json_encode($student->getParent(1520730));

$student->addPayment(1520730, 15000);
echo json_encode($student->getPayment(1520730));