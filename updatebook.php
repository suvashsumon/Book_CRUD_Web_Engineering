<?php
require 'Book.php';

// // Get the index of the book to delete
$book_index = $_POST["update_book_index"];

$updatedInfo = [
    'title' => $_POST['title'],
    'author' => $_POST['author'],
    'isbn' => $_POST['isbn'],
    'pages' => $_POST['pages'],
    'available' => $_POST['available']==="true"?true:false
];

$bookManager = new Book();
$bookManager->updateBook($book_index, $updatedInfo);

// Redirect to index.php
header("Location: index.php");
exit();
?>
