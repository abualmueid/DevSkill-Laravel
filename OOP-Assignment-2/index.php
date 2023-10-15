<?php

use DevSkill\Book\Book;

// include('Customer/Customer.php');
// include('Payment/Payment.php');
// include('Book/Book.php');
include('vendor/autoload.php');

$book = new Book();

$bookInfo = [
    "uId" => 1001,
    "name" => "Bela Furabar Age",
    "price" => 150 
];
$book->addBook($bookInfo);

$bookInfo = [
    "uId" => 1002,
    "name" => "Islami Akida",
    "price" => 320
];
$book->addBook($bookInfo);

$bookInfo = [
    "uId" => 1003,
    "name" => "Hadiser name jaliyati",
    "price" => 350
];
$book->addBook($bookInfo);

echo json_encode($book->getBooks());

$book->addCustomer(1001, [
    "name" => "Abul Kashem",
    "mobileNo" => "01745369875"
]);

$book->addCustomer(1002, [
    "name" => "Babul Hashem",
    "mobileNo" => "01745364889"
]);

$book->addCustomer(1003, [
    "name" => "Abdul Kader",
    "mobileNo" => "0174536658" // Invalid Mobile No
]);

echo json_encode($book->getCustomers());
echo json_encode($book->getCustomer(1002));

$book->addPayment(1001, 150, $book);
$book->addPayment(1002, 300, $book); // less amount than book price, payment unsuccessful
$book->addPayment(1003, 350, $book);

echo json_encode($book->getPayment(1001));
echo json_encode($book->getPayment(1002));
echo json_encode($book->getPayment(1003));
