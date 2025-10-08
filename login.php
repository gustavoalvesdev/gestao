<!DOCTYPE html>
<html>
<head>
	<title>Painel de controle</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= ICONS_URL; ?>">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/font-awesome.min.css">
	<link href="<?php echo INCLUDE_PATH ?>css/style.css" rel="stylesheet" />
</head>
<body>
	<div class="login-wrapper">
		<div class="overlay"></div>
		<div class="box-login">
			<!-- overlay -->
			<?php
				if(isset($_POST['acao'])){
					$user = $_POST['user'];
					$password = $_POST['password'];
					$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = :user");
					$sql->bindValue(':user', $user);
					$sql->execute();

					if($sql->rowCount() == 1){
						$info = $sql->fetch();
						//Logamos com sucesso.

						if (password_verify($password, $info['password'])) {

							
							$_SESSION['login'] = true;
							$_SESSION['user'] = $user;
							$_SESSION['password'] = $password;
							$_SESSION['cargo'] = $info['cargo'];
							$_SESSION['nome'] = $info['nome']; 
							$_SESSION['img'] = $info['img'];
							if(isset($_POST['lembrar'])){
								setcookie('lembrar',true,time()+(60*60*24),'/');
								setcookie('user',$user,time()+(60*60*24),'/');
								setcookie('password',$password,time()+(60*60*24),'/');
							}
							header('Location: '.INCLUDE_PATH);
							die();
						} else {
							//Falhou
							echo '<div class="erro-box"><i class="fa fa-times"></i> Usuário ou senha incorretos!</div>';

						}
					}else{
						//Falhou
						echo '<div class="erro-box"><i class="fa fa-times"></i> Usuário ou senha incorretos!</div>';
					}
				}
			?>
			<div class="logo-empresa">
				<img src="<?= INCLUDE_PATH ?>images/logo.png" alt="logotipo da empresa xyz" />
			</div>
			<!-- logo-empresa -->
			<form method="post">
				<label for="user">NOME DE USUÁRIO</label><br />
				<input type="text" name="user" required />
				<label for="password">SENHA</label><br />
				<input type="password" name="password" required />
				<div class="form-group-login">
					<input type="checkbox" name="lembrar" />
					<label>LEMBRAR-ME</label>
				</div>
				<input type="submit" name="acao" value="FAZER LOGIN">
				<div class="clear"></div>
			</form>
			<a class="link-suporte" href="#" target="_blank"><i class="fas fa-headset"></i> Entrar em Contato com o Suporte Técnico</a>
			<!-- link-suporte -->
		</div><!--box-login-->
    </div>
</body>
</html>