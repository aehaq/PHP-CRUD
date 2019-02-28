<!-- PHP Code for connecting to and submitting to database  -->
<?php 
$page = "read";
require "../config.php";
require "../common.php";

// The following will run when the form with method 'post' is submitted.
if (isset($_POST['submit'])) {
    
    try {
        
        // Connecting to the existing database, hence $dsn instead of just host
        $connection = new PDO($dsn, $username, $password, $options);

        // Writing out our dynamic SQL query
        $sql = 'SELECT * FROM users WHERE location = ' . '"'.$_POST['location'].'"';

        // Prepare SQL Code
        $statement = $connection->prepare($sql);

        // Execute SQL Code
        $statement->execute();

        $result = $statement->fetchAll();

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>

<!-- Title Card -->
<?php include "templates/header.php"; ?>

<!-- Dynamic Results Table -->
<?php 
if (isset($_POST['submit'])) {
    if ($result && $statement->rowCount() > 0) { ?>
    <h2> Results </h2>

    <table>
        <thead>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email Address</th>
            <th>Location</th>
            <th>Date</th>
        </thead>
        <tbody>
            <?php foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo escape($row["id"])?></td>
                    <td><?php echo escape($row["firstname"])?></td>
                    <td><?php echo escape($row["lastname"])?></td>
                    <td><?php echo escape($row["email"])?></td>
                    <td><?php echo escape($row["location"])?></td>
                    <td><?php echo escape($row["date"])?></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
<?php } else { ?>
    <blockquote>
        No results found for <?php echo escape($_POST['location']); ?>
    </blockquote>
<?php } 
}?>

<!-- Base HTML Request Form -->
    <h2> Find users based off location </h2>

    <form method="post">
        <label for="location"> Location </label>
        <input type="text" id="location" name="location">
        <input type="submit" name="submit" value="View Results">
    </form>

    <a href="index.php"> Return Home </a>

<?php include "templates/footer.php"; ?>