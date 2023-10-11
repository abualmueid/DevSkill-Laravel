<?php

class Book
{
    private array $books;

    public function addBook(array $book) : void
    {
        $uId = $book['uId'];
        $name = $book['name'];
        $price = $book['price'];

        $this->books[$uId] = $book;

        //return true;
    }

    public function getBooks() : array
    {
        return $this->books ?? [];
    }
}

$book = new Book();
$bookInfo = [
    "uId" => "1001",
    "name" => "Bela Furabar Age",
    "price" => "150"
];
$book->addBook($bookInfo);

$bookInfo = [
    "uId" => "1002",
    "name" => "Islami Akida",
    "price" => "320"
];
$book->addBook($bookInfo);

$bookInfo = [
    "uId" => "1003",
    "name" => "Hadiser name jaliyati",
    "price" => "350"
];
$book->addBook($bookInfo);

echo json_encode($book->getBooks());