<!DOCTYPE html>
<html lang="pt-br">

<?php include "admin_header.php";?>
        
        <section class="main-content">
            <h1>Editar item</h1>

            <?php 
            $item_id = $_GET['item'];
            ?>
            
            <?php
                function Redimensionar($tmp, $name, $pasta){
                    $img = imagecreatefromjpeg($tmp);
                    $x = imagesx($img);
                    $y = imagesy($img);
                    imagecopyresampled($img, $img, 0, 0, 0, 0, $x, $y, $x, $y);
                    imagejpeg($img, "$pasta$name");
                    imagedestroy($img);
                    return($name);
                }
            ?>

            <?php
                if(isset($_POST['editar']) && $_POST['editar'] == 'editar') {
                    $nome_cad = $_POST['prod_name'];
                    $price_cad = str_replace(",",".",$_POST['prod_price']);
                    $desc_cad = $_POST['prod_desc'];
                    $categ_cad = $_POST['prod_categ'];
                    $file_cad = $_FILES['prod_file'];

                    $filepath = "../images/";
                    $filetype = array('image/jpg', 'image/jpeg', 'image/pjpeg');

                    $nome_file = $file_cad['name'];
                    $tmp_file = $file_cad['tmp_name'];
                    $type_file = $file_cad['type'];

                    if(empty($_FILES['prod_file']['name'])){
                        $editar_produto = mysqli_query($conexao, "UPDATE itens SET name = '$nome_cad', description = '$desc_cad', price = '$price_cad', categoria = '$categ_cad' WHERE id = $item_id")
                        or die(mysqli_error($conexao));
                        
                        if($editar_produto >= '1'){
                            echo "Produto atualizado com sucesso.";
                        }else{
                            echo "Erro ao atualizar produto.";
                        }

                    }else{

                        $pega_imagem = mysqli_query($conexao, "SELECT image FROM itens WHERE id = $item_id")
                        or die(mysqli_error($conexao));

                        if(@mysqli_num_rows($pega_imagem) <= '0'){
                            echo "Erro ao selecionar o produto.";
                        }else{
                            while ($res_pega_imagem = mysqli_fetch_array($pega_imagem)) {
                                $thumb_meta = $res_pega_imagem[0];

                                chdir("../images");
                                $del = unlink($thumb_meta);
                            }
                        }

                        if(!empty($nome_file) && in_array($type_file, $filetype)){
                            $name = md5(uniqid(rand(), true)) . ".jpg";
                            
                            Redimensionar($tmp_file, $name, $filepath);
                            $editar_produto = mysqli_query($conexao, "UPDATE itens SET image = '$name',name = '$nome_cad', description = '$desc_cad', price = '$price_cad', image = '$name', categoria = '$categ_cad' WHERE id = $item_id")
                            or die(mysqli_error($conexao));
                            
                            if($editar_produto >= '1'){
                                echo "Produto atualizado com sucesso.";
                            }else{
                                echo "Erro ao atualizar produto.";
                            }

                        }
                    }
                }
            ?>
            <?php
                $produtos = mysqli_query($conexao, "SELECT id, name, description, price, image, categoria FROM itens WHERE id = '$item_id'")
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


            <form name="cadastrar_prod" method="post" action="" enctype="multipart/form-data" class="cadastrar-item">
                
                <label class="campo-form">Nome do produto
                    <input type="text" name="prod_name" value="<?php echo $produto_name;?>" required/>
                </label>
                <label class="campo-form">Valor do produto
                    <input type="text" name="prod_price" value="<?php echo $produto_price;?>" required/>
                </label>
                <label class="campo-form">Descrição do produto
                    <textarea rows="5" name="prod_desc" required><?php echo $produto_desc;?></textarea>
                </label>
                <label class="campo-form">Categoria do produto
                    <input type="Text" name="prod_categ" value="<?php echo $produto_categ;?>" required/>
                </label>
                <label class="campo-form">Foto do produto
                    <input type="file" name="prod_file"/>
                </label>

                <label class="campo-form">Para trocar a imagem de exibição basta adicionar uma nova</label>

                <button type="submit" name="editar" value="editar" class="buy-catalog" id="cadastrar_btn">Alterar item</button>

                <a href="admin.php"><div class="buy-catalog" id="cancelar_btn">Cancelar</div></a>
            
            </form>
            <?php
                        }
                    }
            ?>
        </section>
    </div>
    <?php include "footer.html";?>    
    
</body>

</html>