<?php
// Get the search keyword from the POST request
$search_keyword = $_POST['search_keyword'];

// Function to read JSON file and return decoded data
function readBooksFromJson($filename) {
    $jsonString = file_get_contents($filename);
    return json_decode($jsonString, true);
}

// Read books from JSON file
$filename = "../book.json";
$books = readBooksFromJson($filename);

// Array to store matching books
$matching_books = [];

// Loop through each book to perform the search
foreach ($books as $book) {
    // Loop through each value of the book
    foreach ($book as $value) {
        // Check if the search keyword is found in the current value
        if (stripos($value, $search_keyword) !== false) {
            // If found, add the book to the matching_books array
            $matching_books[] = $book;
            // Break out of the inner loop to avoid duplicate entries
            break;
        }
    }
}

// Output the matching books (You can modify this part as per your requirement)
echo "<h2>Search Results for '{$search_keyword}':</h2>";
echo "<ul>";
foreach ($matching_books as $book) {
    echo "<li>{$book['title']} by {$book['author']}</li>";
}
echo "</ul>";
?>
