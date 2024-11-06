<?php

require_once(__DIR__ . '/index.php');

function getUsers() {
    $sql = "SELECT * FROM user1";
    $users = queryDataBase($sql)->fetchAll();
    return $users;


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="index.php">Index</a>
    <h1> Llista usuaris</h1>
    <?php
        echo "<pre>";
        print_r(getUsers());
        echo "</pre>";

        ?>




</body>

</html>