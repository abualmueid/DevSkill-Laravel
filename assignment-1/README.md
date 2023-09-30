# Student Information

Student 1: Name - "John", Age - 20, Favorite Subjects - ["Math", "Science"]  
Student 2: Name - "Alice", Age - 18, Favorite Subjects - ["History", "English"]  
Student 3: Name - "Bob", Age - 19, Favorite Subjects - ["Art", "Music"]

## Question 1

Write a PHP function to calculate the average age of the students.

```
function averageAge($students) : float
{
    $sum = 0;

    foreach($students as $student)
        $sum += $student['age'];

    return $sum / 3;
}
```

### Result

The average age of the students is 19

## Question 2

Write a PHP function to find and return the most favorite subject.

### Step-1

Create an array to store how many times each subject is mentioned

```
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
```

### Step-2

Find the subject with the most mentions

```
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
```

### Result

The most favorite subject is English

## Question 3

Encode the student information array into JSON format & print Json.

```
foreach($students as $student)
{
    $encodedStudent = json_encode($student->toArray());
    echo $encodedStudent;
}
```

### Result

JSON Format: 

{"name":"John","age":20,"favoriteSubjects":["Math","Science","English"]}{"name":"Alice","age":18,"favoriteSubjects":["History","English"]}{"name":"Bob","age":19,"favoriteSubjects":["Art","Music"]}

## Question 4

Display the information of each student, including their name, age, and favorite subjects. 

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
```
$i = 1;
foreach($students as $student)
{
    echo "\n\nStudent-$i:\n";
    $student->displayStudent();
    $i++;
}
```

### Result

Student's Information:  

Student-1:  
Name: John  
Age: 20  
Favorite Subjects: Math, Science, English  

Student-2: <br>
Name: Alice <br>
Age: 18 <br>
Favorite Subjects: History, English <br>

Student-3: <br>
Name: Bob <br>
Age: 19 <br>
Favorite Subjects: Art, Music