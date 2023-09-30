<?php

$students = 
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

function averageAge($students) : float
{
    $sum = 0;

    foreach($students as $student)
        $sum += $student['age'];

    return $sum / 3;
}

echo("\nThe average age of the students is " . averageAge($students) . "\n\n");

function findTheMostFavoriteSubject($students) : string 
{
    // Create an array to store how many times each subject is mentioned

    $subjectCounts = [];
    foreach($students as $student)
    {
        foreach($student['favoriteSubjects'] as $subject)
        {
            if(!isset($subjectCounts[$subject]))
            {
                $subjectCounts[$subject] = 0;
            }
            if(isset($subjectCounts[$subject]))
            {
                $subjectCounts[$subject]++;
            }
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

echo("The most favorite subject is " . findTheMostFavoriteSubject($students));

$encodedStudents = json_encode($students); 
echo("\n\nJSON Format: \n\n");
echo $encodedStudents;

$decodedStudents = json_decode($encodedStudents);
// print_r($decodedStudentInformation);

echo("\n\nStudent's Information:");

$i = 1;
foreach($students as $student)
{   
    echo "\n\nStudent-$i:\n";

    echo "Name: {$student['name']}\n";
    echo "Age: {$student['age']}\n";
    echo "Favorite Subjects: ";

    $favoriteSubjectsString = "";
    foreach($student['favoriteSubjects'] as $favoriteSubjects)
    {
        $favoriteSubjectsString .= $favoriteSubjects . ", ";
        // echo("$favoriteSubjects, ");
    }
    echo rtrim($favoriteSubjectsString, ", ");
    
    $i++;
}