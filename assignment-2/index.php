<?php

class Student
{
    // private string $name;
    // private int $age;
    // private array $favoriteSubjects;

    public function __construct(private string $name, private int $age, private array $favoriteSubjects)
    {
        // $this->name = $name;
        // $this->age = $age;
        // $this->favoriteSubjects = $favoriteSubjects;
    }

    public function toArray() : array
    {
        return 
        [
            "name" => $this->name,
            "age" => $this->age,
            "favoriteSubjects" => $this->favoriteSubjects
        ];
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getAge() : float
    {
        return $this->age;
    }

    public function getFavoriteSubjects() : array
    {
        return $this->favoriteSubjects;
    }

    public function displayStudent()
    {
        echo "Name: $this->name\n";
        echo "Age: $this->age\n";
        echo "Favorite Subjects: ";

        $favoriteSubjectsString = "";
        foreach($this->favoriteSubjects as $favoriteSubject)
        {
            $favoriteSubjectsString .= $favoriteSubject . ", ";
        }
        echo rtrim($favoriteSubjectsString, ", ");
    }
}

$s1 = new Student("John", 20, ["Math", "Science", "English"]);
$s2 = new Student("Alice", 18, ["History", "English"]);
$s3 = new Student("Bob", 19, ["Art", "Music"]);

$students = [$s1, $s2, $s3];
echo("\nThe average age of the students is " . averageAge($students) . "\n\n");

function averageAge($students) : float
{
    $sum = 0;
    foreach($students as $student)
    {
        $sum += $student->getAge();
    }

    return $sum / count($students);
}

echo("The most favorite subject is " . findTheMostFavoriteSubject($students));

function findTheMostFavoriteSubject($students) : string
{
    // Create an array to store how many times each subject is mentioned

    $subjectCounts = [];
    foreach($students as $student)
    {
        $favoriteSubjects = $student->getFavoriteSubjects();
        foreach($favoriteSubjects as $subject)
        {
            if(!isset($subjectCounts[$subject]))
                $subjectCounts[$subject] = 0;
            if(isset($subjectCounts[$subject]))
                $subjectCounts[$subject]++;
        }
    }

    // Find the subject with the most mentions

    $maxCount = 0;
    $mostFavoriteSubject = null;

    foreach($subjectCounts as $subject => $count)
    {
        if($count > $maxCount)
        {
            $maxCount = $count;
            $mostFavoriteSubject = $subject;
        }
    }

    return $mostFavoriteSubject;
}

// JSON encoding
echo("\n\nJSON Format: \n\n");
foreach($students as $student)
{
    $encodedStudent = json_encode($student->toArray());
    echo $encodedStudent;
}

// JSON decoding
$decodedStudent = json_decode($encodedStudent);
// print_r($decodedStudent);

echo("\n\nStudent's Information:");
$i = 1;
foreach($students as $student)
{
    echo "\n\nStudent-$i:\n";
    $student->displayStudent();
    $i++;
}