<?php
// Get the search keyword from the POST request
$search_keyword = $_POST['search_keyword'];

// Function to read JSON file and return decoded data
function readBooksFromJson($filename) {
    $jsonString = file_get_contents($filename);
    return json_decode($jsonString, true);
}

// Read books from JSON file
$filename = "../books.json";
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

$len = count($matching_books);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Information</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="card p-5 mt-5 mb-5">
            <div class="row">
                <div class="col-md-7">
                    <h2>Showing result for "<?php echo($search_keyword); ?>"</h2>
                </div>
                <div class="col-md-5 text-right">
                    <form class="form-inline" action="../actions/searchbook.php" method="post">
                        <input type="text" class="form-control form-control-sm" name="search_keyword" required>&nbsp;
                        <button type="submit" class="btn btn-sm btn-info">Search</button>&nbsp;
                        <a href="../index.php" class="btn btn-sm btn-primary">Back</a>
                    </form>
                </div>
            </div>
            <?php if($len>0): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Available</th>
                        <th>Pages</th>
                        <th>ISBN</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($matching_books as $index => $book): ?>
                    <tr>
                        <td>
                            <?php echo $book["title"]; ?>
                        </td>
                        <td>
                            <?php echo $book["author"]; ?>
                        </td>
                        <td>
                            <?php if ($book["available"]): ?>
                            <span class="badge badge-success">Yes</span>
                            <?php else: ?>
                            <span class="badge badge-danger">No</span>
                            <?php endif ?>
                        </td>
                        <td>
                            <?php echo $book["pages"]; ?>
                        </td>
                        <td>
                            <?php echo $book["isbn"]; ?>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="post" action="../pages/updatebook.php">
                                        <input type="hidden" name="update_book_index" value="<?php echo $index; ?>">
                                        <button type="submit" class="btn btn-sm btn-info"
                                            name="update_book">Update</button>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <form method="post" action="../actions/deletebook.php"
                                        onsubmit="return confirmDelete();">
                                        <input type="hidden" name="delete_book_index" value="<?php echo $index; ?>">
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            name="delete_book">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            <div class="text-center mt-5"><h3>No such item found!</h3></div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this book?");
        }
    </script>
</body>

</html>
