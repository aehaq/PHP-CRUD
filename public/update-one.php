<?php 
$page = "update";
require "../config.php";
require "../common.php";


if (isset($_GET['id'])) {

    try {
        
        // Connecting to the existing database, hence $dsn instead of just host
        $connection = new PDO($dsn, $username, $password, $options);
    
        // Set ID as variable fore ease of use
        $id = $_GET['id'];
    
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

// The following will run when the form with method 'post' is submitted.
if (isset($_POST['submit'])) {
    
    try {

        // First we create an array from the POST data
        $user = [
            "id" => $id,
            "firstname" => $_POST['firstname'], 
            "lastname" => $_POST['lastname'], 
            "location" => $_POST['location'], 
            "email" => $_POST['email']
        ];

        // the sprintf function allows us to create a formatted string, which will be our dynamically generated sql query
        $sql = sprintf(
            "UPDATE users SET firstname = %s, lastname = %s, location = %s, email = %s WHERE id = ". $id,
            '"' . $user["firstname"] . '"',
            '"' . $user["lastname"] . '"',
            '"' . $user["location"] . '"',
            '"' . $user["email"] . '"'
        );

        // Prepare SQL Code
        $statement = $connection->prepare($sql);

        // Execute SQL Code
        $statement->execute($user);

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

?>

<?php include "templates/header.php"; ?>

<h2> Update User at ID "<?php echo escape($result["id"])?>" </h2>
<hr/>

<?php if (isset($_POST['submit']) && $statement) { ?>
    <blockquote> User #<?php echo escape($result["id"])?> succesfully updated. </blockquote>
<?php }?>

    <form method="post">
        <label for="firstname">First Name</label><br/>
        <input type="text" name="firstname" id="firstname" value="<?php echo escape($result["firstname"])?>"><br/>
        <label for="lastname">Last Name</label><br/>
        <input type="text" name="lastname" id="lastname" value="<?php echo escape($result["lastname"])?>"><br/>
        <label for="location">Location</label><br/>
        <input type="text" name="location" id="location" value="<?php echo escape($result["location"])?>"><br/>
        <label for="email">Email Address</label><br/>
        <input type="email" name="email" id="email" value="<?php echo escape($result["email"])?>"><br/>
        <input type="submit" name="submit" value="Update"><br/>
    </form>
    

    <br>
    <a href="update.php"> Return to Update Page </a>
    <a href="index.php"> Return Home </a>

<?php include "templates/footer.php"; ?>