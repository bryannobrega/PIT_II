<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css" />
	<title>Cupcakes PIC - Login</title>
</head>
<body>
    <div class="container">
		<div class="container-login">
			<div class="wrap-login">
				<form action="validacao.php" method="post" class="login-form">
					<span class="login-form-title">
						Faça o login
					</span>

					<div class="wrap-input margin-top-35 margin-bottom-35">
						<input class="input-form" type="text" name="usuario" autocomplete="off">
						<span class="focus-input-form" data-placeholder="Nome de usuário"></span>
					</div>

					<div class="wrap-input margin-bottom-35">
						<input class="input-form" type="password" name="senha">
						<span class="focus-input-form" data-placeholder="Senha"></span>
					</div>

					<div class="container-login-form-btn">
						<button class="login-form-btn" type="submit" value="entrar">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
		let inputs = document.getElementsByClassName('input-form');
		for (let input of inputs) {
			input.addEventListener("blur", function() {
				if(input.value.trim() != ""){
					input.classList.add("has-val");
				} else {
					input.classList.remove("has-val");
				}
			});
		}
	</script>
</body>
</html>