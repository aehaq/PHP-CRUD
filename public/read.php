<?php include "templates/header.php"; ?>

    <h2> Find users based off location </h2>

    <form method="post">
        <label for="location"> Location </label>
        <input type="text" id="location" name="location">
        <input type="submit" name="submit" value="View Results">
    </form>

    <a href="index.php"> Return Home </a>

<?php include "templates/footer.php"; ?>