<?php

require 'Book.php';

// Get the new book information from the POST request
$title = $_POST['title'];
$author = $_POST['author'];
$isbn = $_POST['isbn'];
$pages = $_POST['pages'];
$available = $_POST['available'] === 'true' ? true : false; // Convert string 'true'/'false' to boolean


$newBook = [
    'title' => $title,
    'author' => $author,
    'isbn' => $isbn,
    'pages' => $pages,
    'available' => $available 
];

$bookManager = new Book();

$bookManager->addBook($newBook);

// Redirect to index.php
header("Location: index.php");
exit();
?>
