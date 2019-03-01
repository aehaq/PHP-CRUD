<?php 
$page = "";
include "templates/header.php"; 
?>

    <h2> Welcome to this PHP CRUD Demo. </h2>
    <p> If you have not yet installed or desire to reset the database, please click the button below. </p>
    <a class="btn btn-primary" href="../install.php" role="button">Link</a>
    <br/>
    <p> Once you have initialized the database, you may navigate the tabs above to Create, Read, Update, and Delete entries.</p>

<?php include "templates/footer.php"; ?>