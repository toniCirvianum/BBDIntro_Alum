<?php
include('index.php');
if (isset($_POST) && !empty($_POST)) {

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

$newUser = [
    'name'=>$name,
    'username'=>$username,
    'password'=>$password,
    'admin'=>1
];

$colums = implode(", ",array_keys($newUser));
$values = ":".implode(", :",array_keys($newUser));
$sql = "INSERT INTO user1 ($colums) VALUES ($values)";
$params = [];
foreach ($newUser as $key => $value) {
    $params[":$key"]=$value;
}
$result = queryDataBase($sql,$params,true);

if ($result != null) {
    echo "<h1>usuaris insertat amb id $result</h1>";
} else {
    echo "<h1> error al insertar usuaris </h1>";
}

}
//INSERT INTo user1 columns VALUES valors



// include('index.php');
// $sql =
//     "
// INSERT INTO user1 ( name, username, password, admin) VALUES
// ('Toni Fernandez', 'admin', '123', 1),
// ('Raquel Boronat', 'raquel', '123', 0),
// ('Samuel Sanchez', 'samu', '123', 0),
// ('Julia Xirinachs', 'julia', '123', 1),
// ('Ramon Farre', 'ramon', 'xyz', 1);
// ";
// $result = queryDataBase($sql);

// if ($result != null) {
//     echo "<h1>usuaris insertats</h1>";
// } else {
//     echo "<h1> error al insertar usuaris </h1>";
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="#" method="post">
        <h1>Introduir usuari</h1>
        <label for="name">Nom:</label>
        <input type="text" name="name">
        <label for="name">Username:</label>
        <input type="text" name="username">
        <label for="name">passwprd:</label>
        <input type="text" name="password">
        <input type="submit" value="Enviar">
    </form>

</body>

</html>