<?php

$connection = new PDO(
    // data source name
    "mysql:host=localhost", 
    // username
    "root", 
    // password
    "root", 
    // Options added for Error Reporting: throw exceptions
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
);

?>