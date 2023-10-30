<?php 

include('Student.php');

$students = [
    [
        "name" => "Mueid",
        "age" => 29,
        "favorite_subjects" => ["English", "Arabic", "CSE"]
    ],
    
    [
        "name" => "Rasel",
        "age" => 25,
        "favorite_subjects" => ["History", "CSE"]
    ],
    
    [
        "name" => "Hasan",
        "age" => 20,
        "favorite_subjects" => ["Bangla", "Arabic"]
    ]
];

echo "Students Information: <br><br>"; 
displayStudent($students);

echo "The average age of the students is: " . averageAge($students) . "<br><br>";
echo "The most favorite subject is: " . findMostFavoriteSubject($students) . "<br><br>";

$encodedStudents = json_encode($students);
echo "Json Format: <br>" . $encodedStudents . "<br><br>";



