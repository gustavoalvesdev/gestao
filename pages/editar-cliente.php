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

	<form method="POST">

		<?php 
			if (isset($_POST['acao_pagamento'])) {

				$cliente_id = $id;
				$nome = $_POST['nome_pagamento'];
				//$valor = str_replace('.','',$_POST['valor]);
				//$valor = str_replace(',','.',$valor);
				$valor = $_POST['valor'];
				$intervalo = $_POST['intervalo'];
				$numero_parcelas = $_POST['parcelas'];
				$status = 0;
				$vencimentoOriginal = $_POST['vencimento'];
				for($i = 0; $i < $numero_parcelas; $i++) {
					$vencimento = strtotime($vencimentoOriginal) + (($i * $intervalo) * (60*60*24));
					$sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.financeiro` VALUES(null, ?, ?, ?, ?, ?)");
					if($sql->execute(array($cliente_id, $nome, $valor, date('Y-m-d', $vencimento), 0))) {
						Painel::alert('sucesso', 'O pagamento foi inserido com sucesso!');
					} else {
						Painel::alert('erro', 'Falha no Pagamento!');	
					}
				}

			}
		?>

		<div class="form-group">
			<label>Nome do Pagamento:</label>
			<input type="text" name="nome_pagamento" />
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
			<input type="date" name="vencimento" />
		</div>
		<!-- form-group -->

		<div class="form-group">
			<input type="submit" name="acao_pagamento" value="Inserir Pagamento" />
		</div>
		<!-- form-group -->
		

	</form>

	<h2><i class="fas fa-id-card"></i> Pagamentos Pendentes: </h2>

	<div class="wraper-table">
        <table>
            <tr>
                <td>Descrição do Pagamento</td>
                <td>Cliente</td>
                <td>Valor</td>
                <td>Vencimento</td>
                <td>#</td>
            </tr>

        </table>
	</div>

	<h2><i class="fas fa-id-card"></i> Pagamentos Concluídos: </h2>

	<div class="wraper-table">
        <table>
            <tr>
                <td>Descrição do Pagamento</td>
                <td>Cliente</td>
                <td>Valor</td>
                <td>Vencimento</td>
                <td>#</td>
            </tr>

        </table>
	</div>

</div><!--box-content-->