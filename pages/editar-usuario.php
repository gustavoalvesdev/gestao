<div class="box-content">
	<h2><i class="fas fa-pencil-alt"></i> Editar Usuário</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
				//Enviei o meu formulário.
				
				$nome = $_POST['nome'];
				$senha = $_POST['password'];
				$imagem = $_FILES['imagem'];
				$imagem_atual = $_POST['imagem_atual'];
				$usuario = new Usuario();
				if($imagem['name'] != ''){

					//Existe o upload de imagem.
					if(Painel::imagemValida($imagem)){
						Painel::deleteFile($imagem_atual);
						$imagem = Painel::uploadFile($imagem);
						if($usuario->atualizarUsuario($nome,$senha,$imagem)){
							$_SESSION['img'] = $imagem;
							$_SESSION['nome'] = $_POST['nome'];
							//Painel::alert('sucesso','Atualizado com sucesso junto com a imagem!');
							header('Location: '.INCLUDE_PATH.'painel/editar-usuario?update=true&image=true');
						}else{
							$_SESSION['nome'] = $_POST['nome'];
							header('Location: '.INCLUDE_PATH.'painel/editar-usuario?update=true&image=false');
							//Painel::alert('erro','Ocorreu um erro ao atualizar junto com a imagem');
						}
					}else{
						$_SESSION['nome'] = $_POST['nome'];
						//Painel::alert('erro','O formato da imagem não é válido');
					}
				}else{
					$imagem = $imagem_atual;
					if($usuario->atualizarUsuario($nome,$senha,$imagem)){
						$_SESSION['nome'] = $_POST['nome'];
						//Painel::alert('sucesso','Atualizado com sucesso!');
						header('Location: '.INCLUDE_PATH.'painel/editar-usuario?update=true');
					}else{
						$_SESSION['nome'] = $_POST['nome'];
						header('Location: '.INCLUDE_PATH.'painel/editar-usuario?update=false');
						//Painel::alert('erro','Ocorreu um erro ao atualizar...');
					}
				}

			}

			
		?>

		<?php 
			if (isset($_GET['update']) && isset($_GET['image'])) {
				if ($_GET['update'] && $_GET['image']) {
					Painel::alert('sucesso','Atualizado com sucesso junto com a imagem!');
				} else if ($_GET['update'] && !$_GET['image']) {
					Painel::alert('erro','Ocorreu um erro ao atualizar junto com a imagem');
				}
			} else if (isset($_GET['update']) && !isset($_GET['image'])) {
				Painel::alert('sucesso','Atualizado com sucesso!');
			} else if (isset($_GET['update']) && !$_GET['update'])  {
				Painel::alert('erro','Ocorreu um erro ao atualizar...');
			}
		?>

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" required value="<?php echo $_SESSION['nome']; ?>">
		</div><!--form-group-->
		<div class="form-group">
			<label>Senha:</label>
			<input type="password" name="password" value="<?php echo $_SESSION['password']; ?>" required>
		</div><!--form-group-->

		<div class="form-group">
			<label>Imagem</label>
			<input type="file" name="imagem"/>
			<input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao" value="Atualizar!">
		</div><!--form-group-->

	</form>



</div><!--box-content-->