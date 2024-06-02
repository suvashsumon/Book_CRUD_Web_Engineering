<?php
// Get the index of the book to update and the new book information from the form
$book_index = $_POST["update_book_index"];
$title = $_POST['title'];
$author = $_POST['author'];
$isbn = $_POST['isbn'];
$pages = $_POST['pages'];
$available = $_POST['available'] === 'true' ? true : false;

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
    // Update the book information at the specified index
    $books[$book_index]['title'] = $title;
    $books[$book_index]['author'] = $author;
    $books[$book_index]['isbn'] = $isbn;
    $books[$book_index]['pages'] = $pages;
    $books[$book_index]['available'] = $available;

    // Write the updated book list back to the JSON file
    writeBooksToJson($filename, $books);
}

// Redirect to index.php
header("Location: ../index.php");
exit();
?>
