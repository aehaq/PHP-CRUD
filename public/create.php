<?php include "templates/header.php"; ?>

    <h2> Add contact info </h2>

    <form method="post">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" id="firstname">
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" id="lastname">
        <label for="company">Location</label>
        <input type="text" name="company" id="company">
        <label for="email">Email Address</label>
        <input type="email" name="email" id="email">
        <input type="submit" name="submit" value="Submit">
    </form>

    <a href="index.php"> Return Home </a>

<?php include "templates/footer.php"; ?>