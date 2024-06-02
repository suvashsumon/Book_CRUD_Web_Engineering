<?php

class Book {
    private $filePath;

    public function __construct($filePath = 'books.json') {
        $this->filePath = $filePath;
    }

    // 1. Read the JSON file and return the books information as an array
    public function readBooks() {
        if (!file_exists($this->filePath)) {
            return [];
        }

        $jsonContent = file_get_contents($this->filePath);
        return json_decode($jsonContent, true);
    }

    // 2. Update the JSON file with new book information
    public function addBook($newBook) {
        $books = $this->readBooks();
        $books[] = $newBook;
        $this->writeBooks($books);
    }

    // 3. Search by a keyword
    public function searchBooks($search_keyword) {
        $books = $this->readBooks();
        $matching_books = [];
        foreach ($books as $book) {
            foreach ($book as $value) {
                if (stripos($value, $search_keyword) !== false) {
                    $matching_books[] = $book;
                    break;
                }
            }
        }

        return $matching_books;
    }

    // 4. Update a specific book's information
    public function updateBook($bookId, $updatedBook) {
        $books = $this->readBooks();
        $books[$bookId]['title'] = $updatedBook['title'];
        $books[$bookId]['author'] = $updatedBook['author'];
        $books[$bookId]['isbn'] = $updatedBook['isbn'];
        $books[$bookId]['pages'] = $updatedBook['pages'];
        $books[$bookId]['available'] = $updatedBook['available'];
        $this->writeBooks($books);
    }

    // Helper function to write the books array back to the JSON file
    private function writeBooks($books) {
        file_put_contents($this->filePath, json_encode($books, JSON_PRETTY_PRINT));
    }
}

// // Example Usage:

// // Initialize the Book class
// $bookManager = new Book();

// // Add a new book
// $newBook = [
//     'id' => 1,
//     'title' => '1984',
//     'author' => 'George Orwell',
//     'description' => 'A dystopian novel'
// ];
// $bookManager->addBook($newBook);

// // Read all books
// $allBooks = $bookManager->readBooks();
// print_r($allBooks);

// // Search for books with a keyword
// $searchResults = $bookManager->searchBooks('1984');
// print_r($searchResults);

// // Update a specific book
// $updatedBook = [
//     'title' => 'Nineteen Eighty-Four',
//     'author' => 'George Orwell',
//     'description' => 'A dystopian social science fiction novel and cautionary tale.'
// ];
// $bookManager->updateBook(1, $updatedBook);

// // Read all books to see the updates
// $allBooks = $bookManager->readBooks();
// print_r($allBooks);

?>
