<?php

// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
    if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
        header("Location: index.php"); exit;
    }

    include "conexao.php";

    $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

// Validação do usuário/senha digitados


$users = mysqli_query($conexao, "SELECT id, username, level FROM users WHERE username = '$usuario' AND password = '". sha1($senha) ."' LIMIT 1")
or die(mysqli_error($conexao));

if(mysqli_num_rows ( $users ) != '1'){
    echo "Login inválido.";
}else{  
    while($res_user = mysqli_fetch_array($users)){
        $user_id = $res_user[0];
        $user_name = $res_user[1];
        $user_level = $res_user[2];
    }
}

// Se a sessão não existir, inicia uma
if (!isset($_SESSION)) session_start();

// Salva os dados encontrados na sessão
$_SESSION['UsuarioID'] = $user_id;
$_SESSION['UsuarioNome'] = $user_name;
$_SESSION['UsuarioNivel'] = $user_level;

// Redireciona o visitante
header("Location: admin.php"); 
exit;
?>