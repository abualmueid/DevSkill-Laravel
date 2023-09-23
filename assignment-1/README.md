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

//--------- Creating an array of three student's information ---------//

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

echo("Array of Student Information:\n\n");
print_r($studentInformation);

//------- Calculating average age -------//

function averageAge() : float
{
    global $studentInformation;
    $sum = 0;

    foreach($studentInformation as $studInfo)
        $sum += $studInfo['age'];

    return $sum / 3;
}

echo("\nThe average age of the students is " . averageAge() . "\n\n");

// -------- Finding the most favorite subject --------- //

function findTheMostFavoriteSubject() : string 
{
    // Create an array to store how many times each subject is mentioned

    $subjectCounts = [];
    global $studentInformation;
    foreach($studentInformation as $studInfo)
    {
        foreach($studInfo['favoriteSubjects'] as $subject)
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

echo("The most favorite subject is " . findTheMostFavoriteSubject());

//------- Json encoding -------//

$encodedStudentInformation = json_encode($studentInformation); 
echo("\n\nJSON Format: \n\n");
echo $encodedStudentInformation;

//------- Json decoding -------//

$decodedStudentInformation = json_decode($encodedStudentInformation);
// print_r($decodedStudentInformation);


//-------- displaying each student's information ----------//

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