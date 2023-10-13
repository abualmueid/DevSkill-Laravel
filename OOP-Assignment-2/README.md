# Book Shop

Book-1: "uId" => 1001, "name" => "Bela Furabar Age", "price" => 150 <br>
Book-2: "uId" => 1002, "name" => "Islami Akida", "price" => 320 <br>
Book-3: "uId" => 1003, "name" => "Hadiser name jaliyati", "price" => 350 <br>

## Question 1

Store Book information with UID. Book info must include name, price.

```

public function addBook(array $book) : bool
    {
        $uId = $book['uId'];
        $this->books[$uId] = $book;

        return true;
    }

```

## Question 2

Store Selling Information of book. Like - customer information, payment information

### customer information

must store customer mobile number with checking 11 digit.

```

public function addCustomer(int $bookId, array $customer) : bool
    {
        if(strlen($customer['mobileNo']) !== 11)
        {
            echo "Invalid Mobile No!";

            return false;
        }

        if(strlen($customer['mobileNo']) === 11)
        {
            echo "Valid Mobile No!";
            $this->customers[$bookId] = $customer;

            return true;
        }
    }

```

### payment information

Must validate price when receive sell amount of a book.

```

public function addPayment(int $bookId, int|float $amount, object $book) : bool
    {
        if($book->getBook($bookId)['price'] !== $amount)
        {
            echo "Payment Unsuccessful!";

            return false;
        }
        
        if($book->getBook($bookId)['price'] === $amount)
        {
            $this->payments[$bookId] = $amount;
            echo "Payment Successful!";

            return true;
        }
    }

```