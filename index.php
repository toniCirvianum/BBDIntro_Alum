<?php
//s'ha definit un autoload per fer totes les crides a les classes
require_once(__DIR__ . '/vendor/autoload.php');

//carreguem les variables d'entorn
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();



function getConnection()
//realitza la connexió amb al BBDD
{
    $db_host=$_ENV['DB_HOST'];
    $db_name = $_ENV['DB_NAME'];
    $db_user = $_ENV['DB_USER'];
    $db_password = $_ENV['DB_PASSWORD'];

    $options = [
        PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE=> PDO::FETCH_ASSOC
    ];

    try {
        $connection = new PDO("mysql:host=".$db_host.";dbname=".$db_name,$db_user,$db_password,$options);
        $connection-> EXEC("SET CHARACTER SET UTF8");
        echo "Conexion ok a la base de dades";
        return $connection;

    } catch (PDOException $e) {
        echo "Error de connexio a la base de dade->".$e->getMessage();
    }
}

function closeConnection($connection)
//funcio per tancar la connexio
{
    $connection = null;
}

function queryDataBase($sql, $params = null, $id = false)
//executa la sentencia sql que li passem per parametre
{
    try {
        $connection = getConnection();
        $statement = getConnection()->prepare($sql);

        if ($params!=null) {
            $result =$statement->execute($params);
        } else {
            $result= $statement->execute();
        }
        if ($id) {
            $result = $connection->lastInsertId();
        } else {
            $result = $statement->rowCount()>0 ? $statement : null;
        }
        closeConnection($connection);
        return $result;
    } catch (PDOException $err) {
        
        echo "error: ". $err->getMessage();
    }
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

getConnection();


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