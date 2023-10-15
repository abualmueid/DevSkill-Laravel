<?php

class Book
{
    use Customer, Payment;

    private array $books;

    public function addBook(array $book) : bool
    {
        $uId = $book['uId'];
        $this->books[$uId] = $book;

        return true;
    }

    public function getBooks() : array
    {
        return $this->books ?? [];
    }

    public function getBook($bookId) : array
    {
        return $this->books[$bookId] ?? [];
    }
}