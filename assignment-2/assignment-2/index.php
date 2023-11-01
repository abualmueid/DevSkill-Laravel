<?php 

include('Student.php');

$s1 = new Student("Mueid", 29, ["English", "Arabic", "CSE"]);
$s2 = new Student("Rasel", 25, ["History", "CSE"]);
$s3 = new Student("Hasan", 39, ["Bangla", "Arabic"]);

$students = [$s1, $s2, $s3];

echo "Students Information: <br><br>"; 
$s1->displayStudent($students);

echo "The average age of the students is: " . $s1->averageAge($students) . "<br><br>";
echo "The most favorite subject is: " . $s1->findMostFavoriteSubject($students) . "<br><br>";

echo "Json Format: <br>";
foreach($students as $student)
{
    $encodedStudents = json_encode($student->toArray());
    echo $encodedStudents . "<br>";
}



