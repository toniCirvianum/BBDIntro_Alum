<?php
//s'ha definit un autoload per fer totes les crides a les classes
require_once(__DIR__ . '/vendor/autoload.php');

//carreguem les variables d'entorn
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();



function getConnection()
//realitza la connexió amb al BBDD
{

}

function closeConnection($connection)
//funcio per tancar la connexio
{

}

function queryDataBase($sql, $params = null, $id = false)
//executa la sentencia sql que li passem per parametre
{

}

if (isset($_GET['id'])) {
    $id = htmlspecialchars(($_GET['id']));
   
}

//insert users
// INSERT INTO user1 (id, name, username, password, admin) VALUES
// (1, 'Toni Fernandez', 'admin', '123', 1),
// (2, 'Raquel Boronat', 'raquel', '123', 0),
// (3, 'Samuel Sanchez', 'samu', '123', 0),
// (4, 'Julia Xirinachs', 'julia', '123', 1),
// (5, 'Ramon Farre', 'ramon', 'xyz', 1);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Consulta de usuaris</h1>
    <form action="#" method="get">
        <label for="id">Uusari a consultar:</label>
        <input type="text" name="id">
        <input type="submit" value="Consultar">
    </form>
    <h1>
    <a href="users.php">Llista d'usuaris</a>
    </h1>

</body>

</html>