<?php

// Creating an array of three student's information
$studentInformation = 
[
    "student-1" => 
    [
        "name" => "John",
        "age" => 20,
        "favoriteSubjects" => ["Math", "Science", "English"]
    ],

    "student-2" => 
    [
        "name" => "Alice",
        "age" => 18,
        "favoriteSubjects" => ["History", "English"]
    ],

    "student-3" => 
    [
        "name" => "Bob",
        "age" => 19,
        "favoriteSubjects" => ["Art", "Music"]
    ]
];

// Calculating average age
function averageAge() : float
{
    global $studentInformation;
    $sum = 0;

    foreach($studentInformation as $studInfo)
        $sum += $studInfo['age'];

    return $sum / 3;
}

echo("The average age of the students is " . averageAge() . "\n\n");

// Students with the most favorite subjects.





/*
function find_favorite_subjects()
{
    global $student_information;

    foreach($student_information as $stud_info)
    {
        print_r($stud_info['favorite_subjects']);
    }
}


findFavoriteSubjects();
*/

// Json encoding
$encodedStudentInformation = json_encode($studentInformation); 
echo("JSON Format: \n\n");
echo $encodedStudentInformation;

// Json decoding
$decodedStudentInformation = json_decode($encodedStudentInformation);
// print_r($decodedStudentInformation);


// displaying each student's information
echo("\n\nStudent's Information:");

$i = 1;
foreach($studentInformation as $studInfo)
{   
    echo "\n\nStudent-$i:\n";

    echo "Name: {$studInfo['name']}\n";
    echo "Age: {$studInfo['age']}\n";
    echo "Favorite Subjects: ";

    $favoriteSubjectsString = "";
    foreach($studInfo['favoriteSubjects'] as $favoriteSubjects)
    {
        $favoriteSubjectsString .= $favoriteSubjects . ", ";
        // echo("$favoriteSubjects, ");
    }
    echo rtrim($favoriteSubjectsString, ", ");
    
    $i++;
}

