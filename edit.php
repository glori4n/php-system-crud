<!-- This snippet was made by Glori4n(https://glori4n.com) as an exercise -->

<?php

    require 'config.php';

    if(isset($_GET['id'])){
    $id = addslashes($_GET['id']);

    if(isset($_POST["submit"])){
        $name = addslashes($_POST["name"]);
        $email = addslashes($_POST["email"]);
        $sql = "UPDATE users SET name ='$name', email='$email' WHERE id = '$id'";
        $pdo->query($sql);
    }

    $sql = "SELECT * FROM users WHERE id = '$id'";
    $sql = $pdo->query($sql);

    if($sql->rowCount() > 0){
        $data =  $sql->fetch();

        if(isset($_POST["submit"]) && isset($_POST["password"])){
            $pass = addslashes(md5($_POST["password"]));
            $sqlpass = "UPDATE users SET password ='$pass' WHERE id ='$id'";
            $pdo->query($sqlpass);
        }

    }else{
        header('Location: index.php');
    }

    }else{
        header('Location: index.php');
    }

    if(isset($_POST["submit"])){
        $pdo->query($sql);
        header('Location: index.php');
    }

?>

<h2>Update user: <?= $data["id"]; ?></h2>
<form method="POST">
    <label>Name:</label>
    <input type="text" name="name" value="<?= $data["name"]; ?>">
    <label>E-mail:</label>
    <input type="email" name="email" value="<?= $data["email"]; ?>">
    <label>Password:</label>
    <input type="password" name="password">
    <input type="submit" name="submit">
</form>

<a href="index.php">Back</a>