<?php
// Get the new book information from the POST request
$title = $_POST['title'];
$author = $_POST['author'];
$isbn = $_POST['isbn'];
$pages = $_POST['pages'];
$available = $_POST['available'] === 'true' ? true : false; // Convert string 'true'/'false' to boolean

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

// Create a new book array
$newBook = array(
    "title" => $title,
    "author" => $author,
    "isbn" => $isbn,
    "pages" => $pages,
    "available" => $available
);

// Add the new book to the books array
$books[] = $newBook;

// Write the updated books list back to the JSON file
writeBooksToJson($filename, $books);

// Redirect to index.php
header("Location: ../index.php");
exit();
?>
