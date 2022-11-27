<!DOCTYPE html>
<html lang="pt-br">

<?php include "admin_header.php";?>
        
        <section class="main-content">
            <h1>Cadastrar item</h1>

            <?php
                function Redimensionar($tmp, $name, $pasta){
                    $img = imagecreatefromjpeg($tmp);
                    $x = imagesx($img);
                    $y = imagesy($img);
                    imagecopyresampled($img, $img, 0, 0, 0, 0, $x, $y, $x, $y);
                    imagejpeg($img, "$pasta/$name");
                    imagedestroy($img);
                    return($name);
                }
            ?>

            <?php
                if(isset($_POST['cadastrar']) && $_POST['cadastrar'] == 'cadastrar') {
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

                    if(!empty($nome_file) && in_array($type_file, $filetype)){
                        $name = md5(uniqid(rand(), true)) . ".jpg";
                        
                        Redimensionar($tmp_file, $name, $filepath);

                        $cadastrar_produto = mysqli_query($conexao, "INSERT INTO itens (name, description, price, image, categoria) VALUES ('$nome_cad', '$desc_cad', '$price_cad', '$name', '$categ_cad')")
                        or die(mysqli_error($conexao));

                        if($cadastrar_produto >= '1'){
                            echo "Produto cadastrado com sucesso.";
                        }else{
                            echo "Erro ao cadastrar produto.";
                        }
                    }
                }
            ?>


            <form name="cadastrar_prod" method="post" action="" enctype="multipart/form-data" class="cadastrar-item">
                
                <label class="campo-form">Nome do produto
                    <input type="text" name="prod_name" required/>
                </label>
                <label class="campo-form">Valor do produto
                    <input type="text" name="prod_price" required/>
                </label>
                <label class="campo-form">Descrição do produto
                    <textarea rows="5" name="prod_desc" required></textarea>
                </label>
                <label class="campo-form">Categoria do produto
                    <input type="Text" name="prod_categ" required/>
                </label>
                <label class="campo-form">Foto do produto
                    <input type="file" name="prod_file" required/>
                </label>

                <button type="submit" name="cadastrar" value="cadastrar" class="buy-catalog" id="cadastrar_btn">Cadastrar item</button>

                <a href="admin.php"><div class="buy-catalog" id="cancelar_btn">Cancelar</div></a>
            
            </form>
        </section>
    </div>
    <?php include "footer.html";?>    
    
</body>

</html>