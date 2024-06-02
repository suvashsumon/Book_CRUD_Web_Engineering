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
            <form method="post" action="../addnewbook.php">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="author">Author:</label>
                        <input type="text" class="form-control" id="author" name="author" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="isbn">ISBN:</label>
                        <input type="text" class="form-control" id="isbn" name="isbn" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="pages">Pages:</label>
                        <input type="number" class="form-control" id="pages" name="pages" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="available">Available:</label>
                        <select type="text" class="form-control" id="available" name="available" required>
                            <option value="true">Available</option>
                            <option value="false">Not Available</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="add_book">Add Book</button>
            </form>
            <div>
            </div>
            <!-- Bootstrap JS (Optional) -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>