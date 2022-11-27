<?php
    $hostname = "localhost";
    $database = "cupcakes_pic";
    $username = "root";
    $password = "";

    $conexao = mysqli_connect("$hostname", "$username", "$password", "$database")
    or die(mysqli_error($conexao));
?>