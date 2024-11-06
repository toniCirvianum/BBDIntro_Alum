<?php

include('index.php');
$sql =
"
INSERT INTO user1 ( name, username, password, admin) VALUES
('Toni Fernandez', 'admin', '123', 1),
('Raquel Boronat', 'raquel', '123', 0),
('Samuel Sanchez', 'samu', '123', 0),
('Julia Xirinachs', 'julia', '123', 1),
('Ramon Farre', 'ramon', 'xyz', 1);
";
$result = queryDataBase ($sql);

if ($result!=null) {
    echo "<h1>usuaris insertats</h1>";
} else {
    echo "<h1> error al insertar usuaris </h1>";
}

