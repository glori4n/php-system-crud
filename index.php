<!-- This snippet was made by Glori4n(https://glori4n.com) as an exercise -->

<?php

    require 'config.php';
    $sql = "SELECT * FROM users";
    $sql = $pdo->query($sql);
    
?>

<table width="100%">
    <tr>
    <th>Nome</th>
    <th>E-mail</th>
    <th>Nome</th>
    </tr>
    <?php
    if($sql->rowCount() > 0){
    foreach($sql->fetchAll() as $user){
        echo "<tr>";
        echo "<td style='text-align:center'>".$user["name"]."</td>";
        echo "<td style='text-align:center'>".$user["email"]."</td>";
        echo '<td style="text-align:center"><a href="edit.php?id='.$user["id"].'">Editar</a> - <a href="delete.php?id='.$user["id"].'">Excluir</a>';
        echo "</tr>";
    }
    }else{
    echo "There are no registered users.";
    }
?>
</table>
<br>
<h2 style="text-align:center"><a href="add.php">Add new user</a></h2>