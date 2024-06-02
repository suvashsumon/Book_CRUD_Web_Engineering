<?php

require 'Book.php';

$bookManager = new Book();
$books = $bookManager->searchBooks('i');
var_dump($books);
?>
