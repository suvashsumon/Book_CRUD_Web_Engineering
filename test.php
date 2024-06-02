<?php

require 'Book.php';

$bookManager = new Book();
$books = $bookManager->readBooks();;
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
                    <h2>List of Books</h2>
                </div>
                <div class="col-md-5 text-right">
                    <form class="form-inline" action="actions/searchbook.php" method="post">
                        <input type="text" class="form-control form-control-sm" name="search_keyword" required>&nbsp;
                        <button type="submit" class="btn btn-sm btn-info">Search</button>&nbsp;
                        <a href="pages/addnewbook.php" class="btn btn-sm btn-primary">Add New Book</a>
                    </form>
                </div>
            </div>
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
                    <?php foreach ($books as $index => $book): ?>
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
                                    <form method="post" action="pages/updatebook.php">
                                        <input type="hidden" name="update_book_index" value="<?php echo $index; ?>">
                                        <button type="submit" class="btn btn-sm btn-info"
                                            name="update_book">Update</button>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <form method="post" action="actions/deletebook.php"
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