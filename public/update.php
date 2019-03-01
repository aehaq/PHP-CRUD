<?php 

$page = "update";
try {
    require "../config.php";
    require "../common.php";
    
    // Connecting to the existing database, hence $dsn instead of just host
    $connection = new PDO($dsn, $username, $password, $options);

    // Our SQL query
    $sql = 'SELECT * FROM users';

    // Prepare SQL Code
    $statement = $connection->prepare($sql);

    // Execute SQL Code
    $statement->execute();

    $result = $statement->fetchAll();

} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}

?>

<?php include "templates/header.php"; ?>

<h2> Update Users </h2>
<hr/>

<?php if ($result && $statement->rowCount() > 0) { ?>
    <table>
        <thead>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email Address</th>
            <th>Location</th>
            <th>Date</th>
            <th>Update</th>
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
                    <td><a href="update-one.php?id=<?php echo escape($row["id"])?>">Edit</a></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
<?php } else { ?>
    <blockquote>
        Database currently empty. Please create users to test other features.
    </blockquote>
<?php }?>

    <a href="index.php"> Return Home </a>

<?php include "templates/footer.php"; ?>