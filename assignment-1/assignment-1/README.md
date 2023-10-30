# Student Problem

Students Information

```

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

```

## Display Student Information

```

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

```

## Calculate Average Age

```

function averageAge($students): float
{
    $sum = 0;
    foreach($students as $student)
    {
        $sum += $student['age'];
    }

    return $sum / count($students);
}

```

## Find the Most Favorite Subject

### Step-1
Create an array to store how many times each subject is mentioned

### Step-2
Find the subject with the most mentions

```

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

```