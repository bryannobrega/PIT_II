<head>
    <?php 
        include "conexao.php";        
        mysqli_set_charset($conexao, "utf8");
        
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) {
    session_start();
    $nivel_necessario = 2;
}

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: login.php"); exit;
}


    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" />
    <title>Cupcakes PIT - Admin</title>
</head>

<body>



    <section class="top-nav">
    <a href="index.php"><div id="logo"></div></a>
        
        <input id="menu-toggle" type="checkbox" />
        <label class='menu-button-container' for="menu-toggle">
            <div class='menu-button'></div>
        </label>
        <ul class="menu">
            <li><a href="logout.php">Logout</a></li>
            <li><a href="index.php">Comprar</a></li>
        </ul>
    </section>

    <div class="content">
        <section class="left-nav">
            <div class="filter-btn">Funções</div>
            <span class="item-filter"><a href="admin.php">Itens cadastrados</a></span>
            <span class="item-filter"><a href="cadastrar_item.php">Cadastrar item</a></span>
            <span class="item-filter"><a href="pedidos_pendentes.php">Pedidos pendentes</a></span>
            <span class="item-filter"><a href="pedidos_finalizados.php">Pedidos finalizados</a></span>
        </section>