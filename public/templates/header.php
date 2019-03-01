<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>PHP CRUD App</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav class="nav nav-pills nav-fill">
                    <a <?php if ($page=="create") {echo 'class="nav-link nav-item active"';} else {echo 'class="nav-link nav-item"';}?> href="../public/create.php">Create</a>
                    <a <?php if ($page=="read") {echo 'class="nav-link nav-item active"';} else {echo 'class="nav-link nav-item"';}?> href="../public/read.php">Read</a>
                    <a <?php if ($page=="update") {echo 'class="nav-link nav-item active"';} else {echo 'class="nav-link nav-item"';}?> href="../public/update.php">Update</a>
                    <a <?php if ($page=="delete") {echo 'class="nav-link nav-item active"';} else {echo 'class="nav-link nav-item"';}?> href="../public/delete.php">Delete</a>
                </nav>
            </div>
        </div>
        <div class="jumbotron">
    