<?php 

require "../config.php";
require "../common.php";

if (isset($_Get['id'])) {
    try {
        
        // Connecting to the existing database, hence $dsn instead of just host
        $connection = new PDO($dsn, $username, $password, $options);

        // Set ID as variable fore ease of use
        $id= $_GET['id'];
    
        // Our SQL query
        $sql = 'SELECT * FROM USERS WHERE id = ' . $id;
    
        // Prepare & Execute SQL Code
        $statement = $connection->prepare($sql);
        $statement->execute();
    
        // Fetch Result as array
        $result = $statement->fetch(PDO::FETCH_ASSOC);
    
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

?>

<?php include "templates/header.php"; ?>

<h2> Update Single </h2>

    <?php echo escape($id)?>

    <a href="update.php"> Return to Update Page </a>
    <a href="index.php"> Return Home </a>

<?php include "templates/footer.php"; ?>