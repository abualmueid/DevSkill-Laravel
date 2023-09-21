<?php

$student_information = 
[
    "student_1" => 
    [
        "name" => "John",
        "age" => 20,
        "favorite_subjects" => ["Math", "Science"]
    ],

    "student_2" => 
    [
        "name" => "Alice",
        "age" => 18,
        "favorite_subjects" => ["History", "English"]
    ],

    "student_3" => 
    [
        "name" => "Bob",
        "age" => 19,
        "favorite_subjects" => ["Art", "Music"]
    ]
];

// Calculating average age
function average_age()
{
    global $student_information;
    $sum = 0;

    foreach($student_information as $stud_info)
        $sum += $stud_info['age'];

    return $sum / 3;
}

echo "The average age of the students is " . average_age();

// Students with the most favorite subjects.
function find_favorite_subjects()
{
    global $student_information;

    foreach($student_information as $stud_info)
    {
        print_r($stud_info['favorite_subjects']);
    }
}

find_favorite_subjects();

// Json encoding
$encoded_student_information = json_encode($student_information); 
echo $encoded_student_information;

// Json decoding
$decoded_student_information = json_decode($encoded_student_information);
print_r($decoded_student_information);


