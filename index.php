<?php

$dsn = "mysql:dbname=custom;host=127.0.0.1";
$dbuser = "root";
$dbpass = '';

try {
    $pdo = new PDO($dsn, $dbuser, $dbpass);
    echo "Conection Estabilished.";

} catch(PDOException $e) {
    echo "Failed: ".$e->getMessage();
}

$name = @$_POST["nome"];
$email = @$_POST["email"];
$password = md5(@$_POST["password"]);

$sql = "INSERT INTO usuarios (name, email, password) values ('$name', '$email', '$password')";

if(isset($_POST) && $_POST){
    $sql = $pdo->query($sql);
}
?>

<form method="POST">
    <input type="text" name="name">
    <input type="text" name="email">
    <input type="text" name="password">
    <input type="submit" name="submit">
</form>