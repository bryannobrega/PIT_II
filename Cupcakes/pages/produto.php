<!DOCTYPE html>
<html lang="pt-br">

    <?php include"header.php";?>

        <section class="main-content">
    
        <?php 
        $item_id = $_GET['item'];

        $produtos = mysqli_query($conexao, "SELECT id, name, description, price, image, categoria FROM itens WHERE id = '$item_id'")
                or die(mysqli_error($conexao));
                if(@mysql_num_rows == '0'){
                    echo "Produto não encontrado.";
                }else{  
                    while($res_produtos=mysqli_fetch_array($produtos)){
                        $produto_id = $res_produtos[0];
                        $produto_name = $res_produtos[1];
                        $produto_desc = $res_produtos[2];                        
                        $produto_price = $res_produtos[3];
                        $produto_image = $res_produtos[4];
                        $produto_categ = $res_produtos[5];
        ?>

        <?php
            if(isset($_POST['comprar']) && $_POST['comprar'] == 'comprar') {
                $pedido_qtd = $_POST['ped_qntd'];
                $pedido_valor = $pedido_qtd * $produto_price;
                $pedido_cliente = $_POST['ped_cliente'];
                $pedido_endereco = $_POST['ped_endereco'];

                    $comprar_produto = mysqli_query($conexao, "INSERT INTO pedido (nome_cliente, endereco, produto_id, valor, quantidade, status) VALUES ('$pedido_cliente', '$pedido_endereco', '$produto_id', '$pedido_valor', '$pedido_qtd', 'Pendente')")
                    or die(mysqli_error($conexao));

                    if($comprar_produto >= '1'){
                        echo "Pedido criado com sucesso.";
                    }else{
                        echo "Erro ao criar pedido.";
                    }
                }
            }
        ?>

            <h1><?php echo $produto_name;?></h1>

            <div class="item-detail">
                <div class="item-detail-left">
                    <div class="img-catalog"><img src="../images/<?php echo $produto_image;?>" alt=""></div>
                    <a href="filter.php?&amp;categoria=<?php echo $produto_categ;?>"><button class="item-tag"><?php echo $produto_categ;?></button></a>
                    <p><?php echo $produto_desc;?></p>
                    
                </div>
                <div class="item-detail-right">
                    <label class="price-detail">R$ <?php echo $produto_price;?></label>
                    
                    <form name="criar_pedido" method="post" action="" enctype="multipart/form-data" class="criar_pedido">

                        <label class="qtd-detail">Quantidade:</label>
                        <input type="number" min="1" name="ped_qntd" require/>

                        <label class="qtd-detail">Nome completo:</label>
                        <input type="text" name="ped_cliente" require/>

                        <label class="qtd-detail">Endereço:</label>
                        <input type="text" name="ped_endereco" require/>

                        <button type="submit" name="comprar" value="comprar" class="buy-catalog">Comprar</button>
                    </form>
                </div>
            </div>
        <?php
                    }
        ?>
        </section>
    </div>
    <?php include "footer.html";?>    
    
</body>

</html>