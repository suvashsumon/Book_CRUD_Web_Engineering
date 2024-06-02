<?php
// Get the index of the book to delete
$book_index = $_POST["delete_book_index"];

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
    // Remove the book from the array
    unset($books[$book_index]);
    echo "deleted";
    
    // Re-index the array to avoid gaps in indexes
    $books = array_values($books);
    
    // Write the updated book list back to the JSON file
    writeBooksToJson($filename, $books);
}

// Redirect to index.php
header("Location: ../index.php");
exit();
?>
