<!-- This snippet was made by Glori4n(https://glori4n.com) as an exercise -->

<?php

$dsn = "mysql:dbname=custom;host=127.0.0.1";
$dbuser = "root";
$dbpass = '';

try {
    $pdo = new PDO($dsn, $dbuser, $dbpass);
    echo "Connection to the database successfully estabilished!<br><br>";

} catch(PDOException $e) {
    echo "Failed: ".$e->getMessage();
}

$name = addslashes(@$_POST["name"]);
$email = addslashes(@$_POST["email"]);
$password = addslashes(md5(@$_POST["password"]));

$sql = "INSERT INTO users (name, email, password) values ('$name', '$email', '$password')";
$sqlt = "SELECT * FROM users";
$sqlt = $pdo->query($sqlt);



if(isset($_POST['submit'])){
    $sql = $pdo->query($sql);
    echo "<meta http-equiv='refresh' content='0'>";
}

if($sqlt->rowCount() > 0){
    foreach($sqlt->fetchAll() as $user){
        echo "Name: ". $user["name"]. "<br> E-mail - ".$user["email"]."<br><br>";
    }
}else{
    echo "There are no registered users.";
}
?>

<form method="POST">
    <label>Name:</label>
    <input type="text" name="name">
    <label>E-mail:</label>
    <input type="email" name="email">
    <label>Password:</label>
    <input type="text" name="password">
    <input type="submit" name="submit">
</form>