<?php 

class Student 
{
    private string $name;
    private int $age;
    private array $favoriteSubjects;

    public function __construct(string $name, int $age, array $favoriteSubjects)
    {
        $this->name = $name;
        $this->age = $age;
        $this->favoriteSubjects = $favoriteSubjects;
    }

    public function getName(): string
    {
        return $this->name;
    }
    
    public function getAge(): int
    {
        return $this->age;
    }
    
    public function getfavoriteSubjects(): array
    {
        return $this->favoriteSubjects;
    }

    public function toArray(): array
    {
        return [
            "name" => $this->name,
            "age" => $this->age,
            "favoriteSubjects" => $this->favoriteSubjects
        ];
    }

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

    public function averageAge($students): float
    {
        $sum = 0;
        foreach($students as $student)
        {
            $sum += $student->getAge();
        }

        return $sum / count($students);
    }

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
}
