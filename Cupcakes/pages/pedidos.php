<!DOCTYPE html>
<html lang="pt-br">

<?php 
    include "admin_header.php";
    $num_pedido = $_GET['pedido'];
?>

        <section class="main-content">
            <h1>Pedido nº <?php echo $num_pedido;?></h1>
            <?php
                if(isset($_POST['finalizar']) && $_POST['finalizar'] == 'finalizar') {

                    $editar_pedido = mysqli_query($conexao, "UPDATE pedido SET status = 'Finalizado' WHERE id = $num_pedido")
                        or die(mysqli_error($conexao));
                        
                        if($editar_pedido >= '1'){
                            echo "Pedido atualizado com sucesso.";
                        }else{
                            echo "Erro ao atualizar pedido.";
                        }
                    }
            ?>

            <div class = "pedido_produto">
                <h3>Dados do produto</h2>
                <table class="itens-admin">
                    <tr class="table_quatro_colunas" id="table-admin-header">
                        <td>
                            <label>Produto</label>
                        </td>
                        <td>
                            <label>Quantidade</label>
                        </td>
                        <td>
                            <label>Valor unitário</label>
                        </td>
                        <td>
                            <label>Valor total</label>
                        </td>
                    </tr>
            
            <?php

                $pedidos = mysqli_query($conexao, "SELECT id, nome_cliente, endereco, produto_id, valor, quantidade, status FROM pedido WHERE id = '$num_pedido'")
                        or die(mysqli_error($conexao));

                if(@mysql_num_rows == '0'){
                    echo "Não encontramos pedidos no momento.";
                }else{  
                    while($res_pedidos=mysqli_fetch_array($pedidos)){
                        $pedido_id = $res_pedidos[0];
                        $pedido_cliente = $res_pedidos[1];
                        $pedido_endereco = $res_pedidos[2];                     
                        $pedido_produto = $res_pedidos[3];
                        $pedido_valor = $res_pedidos[4];
                        $pedido_quantidade = $res_pedidos[5];
                        $pedido_status = $res_pedidos[6];
                    }
                }
                
                $produtos = mysqli_query($conexao, "SELECT id, name, description, price, image, categoria FROM itens WHERE id = '$pedido_produto'")
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
                    }
                }

            ?>
                    <tr class="table_quatro_colunas">
                        <td>
                            <label><?php echo $produto_name;?></label>
                        </td>
                        <td>
                            <label><?php echo $pedido_quantidade;?></label>
                        </td>
                        <td>
                            <label><?php echo $produto_price;?></label>
                        </td>
                        <td>
                            <label><?php echo $produto_price * $pedido_quantidade;?></label>
                        </td>
                    </tr>            
                </table>
            </div>

            <div class = "pedido_cliente">
                <h3>Dados do cliente</h2>
                <div class = "pedidos_dados">
                    <label>Nome do cliente:</label>
                
                    <label><?php echo $pedido_cliente;?></label> 
                </div>
                <div class = "pedidos_dados">
                    <label>Endereço do cliente:</label> 
                    
                    <label><?php echo $pedido_endereco;?></label> 
                </div>
            </div>
            
            <h3>Status atual</h3>
            <div>
                <div class = "pedidos_status">
                    <label><?php echo $pedido_status;?></label>

                    <?php
                        if($pedido_status == "Pendente"){
                    ?>
                            <label><form name="finalizar_pedido" method="post" action="" enctype="multipart/form-data"><button type="submit" name="finalizar" value="finalizar" class="btn_pedido_ativo">Finalizar</button></form></label>
                    <?php
                        }else{
                    ?>
                            <button class="btn_pedido_inativo">Finalizar</button>
                    <?php
                        }
                    ?>
                </div>
            </div>

            <?php
            ?>

        </section>
    </div>
    <?php include "footer.html";?>    
    
</body>

</html>