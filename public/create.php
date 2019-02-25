<?php 

require "../config.php";

// The following will run when the form with method 'post' is submitted.
if (isset($_POST['submit'])) {
    
    try {

        // Connecting to the existing database, hence $dsn instead of just host
        $connection = new PDO($dsn, $username, $password, $options);

        //If the connection was not unsuccessful, the following will be used to post to our database.

        // First we create an array from the POST data
        $new_user = array(
            "firstname" => $_POST['firstname'], 
            "lastname" => $_POST['lastname'], 
            "location" => $_POST['location'], 
            "email" => $_POST['email']
        );

        // the sprintf function allows us to create a formatted string, which will be our dynamically generated sql query
        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "users",
            implode(", ", array_keys($new_user)),
            '"' .implode('", "', array_values($new_user)).'"'
        );

        // Prepare SQL Code
        $statement = $connection->prepare($sql);

        // Execute SQL Code
        $statement->execute($new_user);

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

?>

<?php include "templates/header.php"; ?>

    <h2> Add contact info </h2>

    <form method="post">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" id="firstname">
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" id="lastname">
        <label for="location">Location</label>
        <input type="text" name="location" id="location">
        <label for="email">Email Address</label>
        <input type="email" name="email" id="email">
        <input type="submit" name="submit" value="Submit">
    </form>

    <a href="index.php"> Return Home </a>

<?php include "templates/footer.php"; ?>