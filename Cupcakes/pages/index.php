<!DOCTYPE html>
<html lang="pt-br">

    <?php include"header.php";?>

        <section class="main-content">
            <h1>Produtos</h1>
            <?php

                $produtos = mysqli_query($conexao, "SELECT id, name, description, price, image, categoria FROM itens")
                or die(mysqli_error($conexao));
                if(@mysql_num_rows == '0'){
                    echo "Não encontramos produtos no momento.";
                }else{  
                    while($res_produtos=mysqli_fetch_array($produtos)){
                        $produto_id = $res_produtos[0];
                        $produto_name = $res_produtos[1];
                        $produto_desc = $res_produtos[2];                        
                        $produto_price = $res_produtos[3];
                        $produto_image = $res_produtos[4];
                        $produto_categ = $res_produtos[5];
            ?>        

                        <div class="item-catalog">
                            <div class="img-catalog"><img src="../images/<?php echo $produto_image;?>" alt=""></div>
                            <label class="name-catalog"><?php echo $produto_name;?></label>
                            <label class="price-catalog">R$ <?php echo $produto_price;?></label>
                            <a href="produto.php?&amp;item=<?php echo $produto_id;?>"><button class="buy-catalog">Comprar</button></a>
                        </div>
            <?php    
                    }
                }
            ?>

        </section>
    </div>

    <?php include "footer.html";?>
    
    
</body>

</html>