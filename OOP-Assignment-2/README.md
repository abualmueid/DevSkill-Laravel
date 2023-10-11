# Student Information

Student-1: "id": 1520730, "name": "Mueid", "major": "CS" <br>
Student-2: "id": 1621321, "name": "Rasel", "major": "EEE" <br>
Student-3: "id": 1756669, "name": "Mustafiz", "major": "ETE" <br>

## Question 1

store student with student id

```
public function addStudent(array $students) : void
    {
        foreach($students as $student)
        {
            $id = $student['id'] ?? uniqid();
            $this->students[$id] = $student;

            // adding parents here
            // $this->students[$id] = $this->getParent($id);
        }
    }

```

## Question 2

get student by student id

```
public function getStudent($id) : array
    {
        return $this->students[$id] ?? []; 
        // return isset($this->students[$id]) ? $this->students[$id] : []; 
        // You don't need foreach loop here. Because it's already there inside isset() method.
    }

```

## Question 3

add parents by student id

```
public function addParents($id, array $parents) : void
    {
        $this->parents[$id] = $parents;
    }
    
```

## Question 4

get parents by student id

```
public function addParents($id, array $parents) : void
    {
        $this->parents[$id] = $parents;
    }
    
```

## Question 5

add payment by student id

```
public function addPayment($id, $amount) : void
    {
        $this->studentPayments[$id] = $amount;
    }
    
```

## Question 6

get payment by student id

```
public function getPayment($id) : int | float
    {
        return $this->studentPayments[$id];
    }
    
```