<!DOCTYPE html>
<html lang="pt-br">

<?php include "admin_header.php";?>

        
        <section class="main-content">
            <table class="itens-admin">
                <tr class="table_duas_colunas" id="table-admin-header">
                    <td>
                        <label>Produto</label>
                    </td>
                    <td>
                        <label>Valor</label>
                    </td>
                </tr>
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

                            <tr class="table_duas_colunas">
                                <td>
                                    <label><a href="editar_item.php?&amp;item=<?php echo $produto_id;?>"><?php echo $produto_name;?></a></label>
                                </td>
                                <td>
                                    <label>R$ <?php echo $produto_price;?></label>
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