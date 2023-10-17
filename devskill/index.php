<?php declare(strict_types=1);

// include('Book/Book.php');
include('vendor/autoload.php');
use MyBook\Book\Book;

$book = new Book();
echo $book->name;

