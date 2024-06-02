<?php
$book_index = $_POST["update_book_index"];

// Read books from JSON file
$books_json = file_get_contents("../books.json");
$books = json_decode($books_json, true);

$book = $books[$book_index];
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
        <div class="card p-5 mb-5 mt-5">
            <h2>Add New Book</h2>
            <form method="post" action="../updatebook.php">
                <input name="update_book_index" value="<?php echo($book_index); ?>" type="hidden">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo($book['title']); ?>" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="author">Author:</label>
                        <input type="text" class="form-control" id="author" name="author" value="<?php echo($book['author']); ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="isbn">ISBN:</label>
                        <input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo($book['isbn']); ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="pages">Pages:</label>
                        <input type="number" class="form-control" id="pages" name="pages" value="<?php echo($book['pages']); ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="available">Available:</label>
                        <select type="text" class="form-control" id="available" name="available" required>
                            <option <?php if($book['available']): echo("selected"); endif; ?> value="true">Available</option>
                            <option <?php if(!$book['available']): echo("selected"); endif; ?>  value="false">Not Available</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="update_book">Update Book</button>
            </form>
            <div>
            </div>
            <!-- Bootstrap JS (Optional) -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>