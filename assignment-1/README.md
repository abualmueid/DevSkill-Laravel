Question:

You are tasked with creating a simple program that manages a list of students' information. Each student's information includes their name, age, and favorite subjects. You need to perform the following tasks:

Create an array of student information with the following structure for three students:

Student 1: Name - "John", Age - 20, Favorite Subjects - ["Math", "Science", "English"]
Student 2: Name - "Alice", Age - 18, Favorite Subjects - ["History", "English"]
Student 3: Name - "Bob", Age - 19, Favorite Subjects - ["Art", "Music"]

Write a PHP function to calculate the average age of the students.

Write a PHP function to find and return the student with the most favorite subjects.
Encode the student information array into JSON format & print Json.

Decode the JSON data back into a PHP array.

Loop through the decoded array and display the information of each student, including their name, age, and favorite subjects.

Answer: 

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

echo "The average age of the students is " . averageAge();

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
echo $encodedStudentInformation;

// Json decoding
$decodedStudentInformation = json_decode($encodedStudentInformation);
// print_r($decodedStudentInformation);


// displaying each student's information
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

