<?php

// Config for database connection

$host       = "localhost";
$username   = "root";
$password   = "password";
$dbname     = "simplecrud_php_aeh";
$dsn        = "mysql:host=$host;dbname=$dbname";
    // Options added for Error Reporting: throw exceptions
$options    = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

?>