<?php
// Get the index of the book to delete
$book_index = $_POST["update_book_index"];

// Function to read JSON file and return decoded data
function readBooksFromJson($filename) {
    $jsonString = file_get_contents($filename);
    return json_decode($jsonString, true);
}

// Function to write JSON data to file
function writeBooksToJson($filename, $books) {
    $jsonString = json_encode($books, JSON_PRETTY_PRINT);
    file_put_contents($filename, $jsonString);
}

// Read books from JSON file
$filename = "../books.json";
$books = readBooksFromJson($filename);

// Check if the book index is valid
if (isset($books[$book_index])) {
    $books[$book_index]['title'] = $_POST['title'];
    $books[$book_index]['author'] = $_POST['author'];
    $books[$book_index]['isbn'] = $_POST['isbn'];
    $books[$book_index]['pages'] = $_POST['pages'];
    $books[$book_index]['available'] = $_POST['available']==="true"?true:false;
    writeBooksToJson($filename, $books);
}

// Redirect to index.php
header("Location: ../index.php");
exit();
?>
