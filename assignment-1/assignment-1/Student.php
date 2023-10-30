<?php 

function displayStudent($students): void 
{
    foreach($students as $student)
    {
        echo "Name: {$student['name']} <br>";
        echo "Age: {$student['age']} <br>";
        echo "Favorite Subjects: ";

        $counter = 1;
        foreach($student['favorite_subjects'] as $favoriteSubject)
        {
            if($counter < count($student['favorite_subjects'])){
                echo $favoriteSubject . ", ";
            } else {
                echo $favoriteSubject;
            }

            $counter++;
        }
        echo "<br><br>";
    }
}

function averageAge($students): float
{
    $sum = 0;
    foreach($students as $student)
    {
        $sum += $student['age'];
    }

    return $sum / count($students);
}

function findMostFavoriteSubject($students): string 
{
    $subjectCounts = [];
    foreach($students as $student)
    {
        foreach($student['favorite_subjects'] as $subject)
        {
            if(!isset($subjectCounts[$subject])){
                $subjectCounts[$subject] = 0;
            }

            if(isset($subjectCounts[$subject])){
                $subjectCounts[$subject]++;
            }
        }
    }

    $maxCount = 0;
    $mostFavoriteSubject = '';

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