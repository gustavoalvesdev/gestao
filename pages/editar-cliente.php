<?php
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$cliente = Painel::select('tb_admin.clientes','id = ?',array($id));
	}else{
		Painel::alert('erro','Você precisa passar o parametro ID.');
		die();
	}
?>
<div class="box-content">
	<h2><i class="fas fa-pencil-alt"></i> Editar Cliente</h2>

	<form class="form-clientes-update" action="<?= INCLUDE_PATH; ?>ajax/form-clientes-update.php" method="post" enctype="multipart/form-data">

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" value="<?= $cliente['nome'] ?>">
		</div>
		<!--form-group-->
		<div class="form-group">
			<label>E-mail:</label>
			<input type="text" name="email" value="<?= $cliente['email'] ?>"> 
		</div>
		<!--form-group-->

		<div class="form-group">
			<label>Tipo:</label>
			<select name="tipo_cliente" class="update">
				<option value="fisico" <?= ($cliente['tipo'] == 'fisico') ? 'selected' : ''; ?>>Físico</option>
				<option value="juridico" <?= ($cliente['tipo'] == 'juridico') ? 'selected' : ''; ?>>Jurídico</option>
			</select>
		</div>
		<!--form-group-->
		<div ref="cpf" class="form-group">
			<label>CPF:</label>
			<input type="text" name="cpf" value="<?= ($cliente['tipo'] === 'fisico') ? $cliente['cpf_cnpj'] : '' ?>" />
		</div>


		<!-- form-group -->
		<div style="display:none;" ref="cnpj" class="form-group">
			<label>CNPJ:</label>
			<input type="text" name="cnpj" value="<?= ($cliente['tipo'] === 'juridico') ? $cliente['cpf_cnpj'] : '' ?>" />
		</div>
		<!-- form-group -->
		<div class="form-group">
			<label>Imagem</label>
			<input type="file" name="novaImagem" />
		</div>
		<!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao" class="acao" value="Atualizar!">
			<input type="hidden" name="id" value="<?= $cliente['id'] ?>" />
			<input type="hidden" name="imagem" value="<?= $cliente['imagem'] ?>" />
			<img src="images/ajax-loader.gif" id="loadingImage" style="display:none" />

		</div>
		<!--form-group-->

	</form>
	<!-- form-clientes -->

	<h2><i class="fas fa-pencil-alt"></i> Adicionar Pagamentos</h2>

	<form method="POST" id="pagto-section">

		<?php 

			if (isset($_POST['acao_pagamento'])) {
				$cliente_id = $id;
				$nome = $_POST['nome_pagto'];	
				//$valor = str_replace('.', '', $_POST['valor']);
				//$valor = str_replace(',', '.', $valor);
				$valor = $_POST['valor'];
				$vencimento = $_POST['vencimento'];
				$numero_parcelas = $_POST['parcelas'];
				$intervalo = $_POST['intervalo'];
				$status = 0;
				$vencimentoOriginal = $_POST['vencimento'];

				$hoje = new DateTime('today');
				$vencimento = new DateTime($vencimentoOriginal);

				if ($vencimento < $hoje) {
					Painel::alert('erro', 'Você selecionou uma data anterior à data de hoje ('.date('d/m').')!');
				} else {
					for ($i = 0; $i < $numero_parcelas; $i++) {
						$vencimento = strtotime($vencimentoOriginal) + (($i * $intervalo) * (60 * 60 * 24));
						$sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.financeiro` VALUES (null,?,?,?,?,?)");
						$sql->execute(array($cliente_id, $nome, $valor, date('Y-m-d', $vencimento), 0));
					}
	
					Painel::alert('sucesso', 'Pagamento(s) inserido(s) com sucesso');
				}

			}

			
		?>

		<div class="form-group">
			<label>Nome do Pagamento:</label>
			<input type="text" name="nome_pagto" />
		</div>
		<!-- form-group -->

		<div class="form-group">
			<label>Valor do Pagamento:</label>
			<input type="text" name="valor" />
		</div>
		<!-- form-group -->

		<div class="form-group">
			<label>Número de Parcelas:</label>
			<input type="number" name="parcelas" />
		</div>
		<!-- form-group -->

		<div class="form-group">
			<label>Intervalo:</label>
			<input type="number" name="intervalo" />
		</div>
		<!-- form-group -->

		<div class="form-group">
			<label>Vencimento:</label>
			<input type="text" name="vencimento" />
		</div>
		<!-- form-group -->

		<div class="form-group">
			<input type="submit" name="acao_pagamento" value="Inserir Pagamento" />
		</div>
		<!-- form-group -->
		

	</form>

	<?php 

		if (isset($_GET['pago'])) {
			$sql = MySql::conectar()->prepare("UPDATE `tb_admin.financeiro` SET status = 1 WHERE id = ?");
			$sql->execute(array($_GET['pago']));
			Painel::alert('sucesso', 'O pagamento foi quitado com sucesso!');
		}

	?>

	<h2><i class="fas fa-id-card"></i> Pagamentos Pendentes de <?= $cliente['nome'] ?>: </h2>

	<div class="wraper-table">
        <table>
            <tr>
                <td>Descrição do Pagamento</td>
                <td>Valor</td>
                <td>Vencimento</td>
                <td>Enviar e-mail</td>
                <td>Marcar como pago</td>
            </tr>

			<?php 

				$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.financeiro` WHERE status = 0 AND cliente_id = ? ORDER BY vencimento ASC");
				$sql->execute(array($id));
				$pendentes = $sql->fetchAll();

				 if (count($pendentes) == 0) {
				 	
					echo '<tr><td colspan="6"><strong>'.$cliente['nome'].'</strong> não possui pagamentos pendentes</td></tr>';

				 } else {

					foreach($pendentes as $pendente) {
					
			?>
					<?php 
						$hoje = new DateTime('today');
						$vencimento = new DateTime($pendente['vencimento']);

						$style = ($vencimento < $hoje) ? "background-color:#F75353; color:white" : "";
					?>
					<tr style="<?= $style ?>">
						<td><?= $pendente['nome'] ?></td>
						<td><?= $pendente['valor'] ?></td>
						<td><?= date('d/m/Y', strtotime($pendente['vencimento'])) ?></td>
						<td><a class="btn edit" href="#"><i class="fa fa-envelope"></i> E-mail</a></td>
						<td><a style="background:#00bfa5" class="btn" href="<?= INCLUDE_PATH ?>editar-cliente?id=<?= $id ?>&pago=<?= $pendente['id'] ?>"><i class="fas fa-money-bill-wave"></i> Pago</a></td>
					</tr>						

				<?php
					}
				}
			?>


				
        </table>
	</div>

	<h2><i class="fas fa-id-card"></i> Pagamentos Concluídos: </h2>

	<div class="wraper-table">
        <table>
            <tr>
                <td>Descrição do Pagamento</td>
                <td>Valor</td>
                <td>Vencimento</td>
            </tr>

			<?php 

				$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.financeiro` WHERE status = 1 AND cliente_id = ? ORDER BY vencimento ASC");
				$sql->execute(array($id));
				$concluidos = $sql->fetchAll();

				if (count($concluidos) == 0) {
					echo "<tr colspan='3'><td><strong>".$cliente['nome']."</strong> não possui pagamentos concluídos</td></tr>";
				} else {

					foreach($concluidos as $concluido) {
					
			?>

				<tr>
					<td><?= $concluido['nome'] ?></td>
					<td><?= $concluido['valor'] ?></td>
					<td><?= date('d/m/Y', strtotime($concluido['vencimento'])) ?></td>
				</tr>						

			<?php
				}
			}
			?>

				

        </table>
	</div>

</div><!--box-content-->