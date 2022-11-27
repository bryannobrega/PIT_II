<!DOCTYPE html>
<html lang="pt-br">

<?php include "admin_header.php";?>

        <section class="main-content">
            <h1>Pedidos finalizados</h1>
            <table class="itens-admin">
                <tr class="table_quatro_colunas" id="table-admin-header">
                    <td>
                        <label>Número pedido</label>
                    </td>
                    <td>
                        <label>Cliente</label>
                    </td>
                    <td>
                        <label>Valor</label>
                    </td>
                    <td>
                        <label>Status</label>
                    </td>
                </tr>

                <?php
                    $pedidos = mysqli_query($conexao, "SELECT id, nome_cliente, endereco, produto_id, valor, quantidade, status FROM pedido WHERE status = 'Finalizado'")
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
                ?>
                
                            <tr class="table_quatro_colunas">
                                <td>
                                    <label><a href="pedidos.php?&amp;pedido=<?php echo $pedido_id;?>"><?php echo $pedido_id;?></a></label>
                                </td>
                                <td>
                                    <label><?php echo $pedido_cliente;?></label>
                                </td>
                                <td>
                                    <label><?php echo $pedido_valor;?></label>
                                </td>
                                <td>
                                    <label><?php echo $pedido_status;?></label>
                                </td>
                            </tr> 

                <?php
                        }
                    }
                ?>

            </table>
            
            </div>
        </section>
    </div>
    <?php include "footer.html";?>   
    
</body>

</html>