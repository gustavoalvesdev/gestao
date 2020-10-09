<div class="box-content">
	<h2><i class="fas fa-id-card" aria-hidden="true"></i> Clientes Cadastrados</h2>

	<div class="busca">
		<h4><i class="fas fa-search"></i> Realizar uma busca:</h4>
		<form method="POST" action="">
			<input type="text" name="busca" placeholder="Procure por nome, email, cpf ou cnpj" />
			<input type="submit" name="acao" value="Buscar" />
			<a href="<?= INCLUDE_PATH ?>gerenciar-clientes" style="float:right;" class="btn-comum">Exibir Todos</a>
		</form>
	</div>
	<!-- busca -->
	<div class="boxes">
	<?php 
		$query = '';
		if (isset($_POST['acao'])) {
			$busca = $_POST['busca'];
			$query = ' WHERE nome LIKE "%'.$busca.'%" OR email LIKE "%'.$busca.'%" OR cpf_cnpj LIKE "%'.$busca.'%"';
		}

		$clientes = MySql::conectar()->prepare('SELECT * FROM `tb_admin.clientes`'.$query);
		$clientes->execute();
		$clientes = $clientes->fetchAll();

		if (isset($_POST['acao'])) {
			echo '<div class="busca-result"><p>Foram encontrados <strong>'.count($clientes).'</strong> resultado(s)</p></div>';
		}

	?>
		<div class="box-single-wrapper">
			<?php foreach($clientes as $value): ?>
			<div class="box-single">
				<div class="topo-box">
					<?php if ($value['imagem']) : ?>
						<h2><img src="<?= INCLUDE_PATH.'/uploads'.'/'.$value['imagem'] ?>" alt="<?= $value['nome'] ?>" style="max-width:80%; max-height:130px;" /></h2>
					<?php else: ?>
						<h2><i class="fa fa-user"></i></h2>
					<?php endif; ?>
				</div>
				<!-- topo-box -->
				<div class="body-box">
					<p><strong><i class="fas fa-pencil-alt"></i> Nome do cliente:</strong> <?= $value['nome']; ?></p>
					<p><strong><i class="fas fa-envelope"></i> E-mail:</strong> <?= $value['email']; ?></p>
					<p><strong><i class="fas fa-id-badge"></i> Tipo:</strong> <?= $value['tipo']; ?></p>
					<p><strong><i class="far fa-credit-card"></i> <?= ($value['tipo'] == 'fisico') ? 'CPF:</strong>' : 'CNPJ:</strong>'; ?><?= $value['cpf_cnpj']; ?></p>
					<div class="group-btn">
						<a class="btn delete" item_id="<?= $value['id'] ?>" href="<?= INCLUDE_PATH ?>"><i class="fas fa-times"></i> Excluir</a>
						<!-- btn delete -->
						<a class="btn edit" href="<?= INCLUDE_PATH ?>editar-cliente?id=<?= $value['id'] ?>"><i class="fas fa-pencil-alt"></i> Editar</a>
					<!-- btn edit -->
					</div>
					<!-- group-btn -->
				</div>
				<!-- body-box -->
			</div>
			<!-- box-single -->
			<?php endforeach; ?>
		</div>
		<!-- box-single-wrapper -->
		
		<div class="clear"></div>
		<!-- clear -->
	</div>
	<!-- boxes -->
</div><!--box-content-->