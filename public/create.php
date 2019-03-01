<!-- PHP Code for connecting to and submitting to database  -->
<?php 
$page = "create";
require "../config.php";
require "../common.php";

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

<!-- Title Card -->
<?php include "templates/header.php"; ?>

<!-- Dynamic Success Message -->
<?php if (isset($_POST['submit']) && $statement) { ?>
    <blockquote> 
        <?php echo escape($_POST['firstname'] . " " . $_POST['lastname']) ?> successfully added.
    </blockquote>
<?php }?>

<!-- Base HTML Create Form -->
    <h2> Add contact info </h2>
    <hr/>

    <form method="post">
        <label for="firstname">First Name</label><br/>
        <input type="text" name="firstname" id="firstname"><br/>
        <label for="lastname">Last Name</label><br/>
        <input type="text" name="lastname" id="lastname"><br/>
        <label for="location">Location</label><br/>
        <input type="text" name="location" id="location"><br/>
        <label for="email">Email Address</label><br/>
        <input type="email" name="email" id="email"><br/>
        <input type="submit" name="submit" value="Submit">
    </form>

    <a href="index.php"> Return Home </a>

<?php include "templates/footer.php"; ?>