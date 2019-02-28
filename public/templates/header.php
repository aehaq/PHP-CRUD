<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD w/ PHP</title>
</head>
<body>
    <h1> CRUD demo w/ PHP </h1>

    <?php 
    
    if ($page == "create" ) {
        echo "<h1> Create </h1>";
    }

    if ($page == "read" ) {
        echo "<h1> Read </h1>";
    }

    if ($page == "update" ) {
        echo "<h1> Update </h1>";
    }

    if ($page == "delete" ) {
        echo "<h1> Delete </h1>";
    }


    ?>