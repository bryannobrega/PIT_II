<head>
    <?php include "conexao.php";?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" />
    <title>Cupcakes PIT</title>
</head>

<body>
    <section class="top-nav">
    <a href="index.php"><div id="logo"></div></a>
        
        <input id="menu-toggle" type="checkbox" />
        <label class='menu-button-container' for="menu-toggle">
            <div class='menu-button'></div>
        </label>
        <ul class="menu">
            <li><a href="admin.php">Admin</a></li>
        </ul>
    </section>
    
    <div class="content">
        <section class="left-nav">
            <div class="filter-btn">Categorias</div>
            <span class="item-filter"><a href="index.php">Todos</a></span>
            <?php
                mysqli_set_charset($conexao, "utf8");
                $categ = mysqli_query($conexao, "SELECT categoria FROM itens")
                or die(mysqli_error($conexao));
                if(@mysql_num_rows == '0'){
                    echo "Não encontramos categorias no momento.";
                }else{
                    $categ_array = [];

                    while($res_categ = mysqli_fetch_array($categ)){
                        array_push($categ_array, "$res_categ[0]");
                    }

                    $categ_array = array_unique($categ_array);
                    
                    for($i = 0; $i < count($categ_array);$i++){
            ?>
                        <span class="item-filter"><a href="filter.php?&amp;categoria=<?php echo $categ_array[$i];?>"><?php echo $categ_array[$i];?></a></span>
            <?php
                    }
                }
            ?>
        </section>
