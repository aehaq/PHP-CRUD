<?php
// This file will be used to store functions for later use

// This escape function will ensure that language will be displayed correctly when echoed by PHP
function escape($html) {
    return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}

?>