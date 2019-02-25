<?php

// Fetch variables for database config
require "config.php";

// Test db install
try {

    // Connect to the database referencing config variables
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
    // Fetch SQL code from init.sql file
    $sql = file_get_contents("data/init.sql");
    // Execute SQL code within our database connection
    $connection->exec($sql);

    echo "Database creation and reset succesful.";

} catch(PDOException $error) {
    // Render text of SQL actions, followed by error if message exists
    echo $sql . "<br>" . $error->getMessage();
}
?>