<?php 
$page = "";
include "templates/header.php"; 
?>

    <div class="nav-section"> 
        <a class="nav-buttons" href="../public/create.php"> Create </a>
        <p> Add a database entry </p>
    </div>

    <div class="nav-section"> 
        <a class="nav-buttons" href="../public/read.php"> Read </a>
        <p> View database entries </p>
    </div>

    <div class="nav-section"> 
        <a class="nav-buttons" href="../public/update.php"> Update </a>
        <p> Make changes to a database entry </p>
    </div>

    <div class="nav-section"> 
        <a class="nav-buttons" href="../public/delete.php"> Delete </a>
        <p> Remove a database entry </p>
    </div>

<?php include "templates/footer.php"; ?>