# Student Problem

Students Information

```

$s1 = new Student("Mueid", 29, ["English", "Arabic", "CSE"]);
$s2 = new Student("Rasel", 25, ["History", "CSE"]);
$s3 = new Student("Hasan", 39, ["Bangla", "Arabic"]);

```

## Display Student Information

```

public function displayStudent($students): void 
    {
        foreach($students as $student)
        {
            echo "Name: {$student->getName()} <br>";
            echo "Age: {$student->getAge()} <br>";
            echo "Favorite Subjects: ";

            $counter = 1;
            foreach($student->getfavoriteSubjects() as $favoriteSubject)
            {
                if($counter < count($student->getfavoriteSubjects())){
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

public function averageAge($students): float
    {
        $sum = 0;
        foreach($students as $student)
        {
            $sum += $student->getAge();
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

public function findMostFavoriteSubject($students): string 
    {
        $subjectCounts = [];
        foreach($students as $student)
        {
            foreach($student->getfavoriteSubjects() as $subject)
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