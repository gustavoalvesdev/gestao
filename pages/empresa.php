<?php
	verificaPermissaoPagina(2);
?>
<div class="box-content">
	<h2><i class="fas fa-pencil-alt"></i>Empresa</h2>

	<form class="form-empresa" action="<?= INCLUDE_PATH; ?>ajax/form-empresa.php" method="post" enctype="multipart/form-data">
		
		<div class="form-group">
			<label>Nome da Empresa:</label>
			<input type="text" name="nome_empresa">
		</div>
		<!--form-group-->

        <div class="form-group">
			<label>Nome Fantasia:</label>
			<input type="text" name="nome_fantasia">
		</div>
		<!--form-group-->

        <div class="form-group">
			<label>Telefone:</label>
			<input type="text" name="telefone">
		</div>
		<!--form-group-->

        <div class="form-group">
			<label>Endereço:</label>
			<input type="text" name="endereco">
		</div>
		<!--form-group-->

        <div class="form-group">
			<label>Número:</label>
			<input type="text" name="numero">
		</div>
		<!--form-group-->

        <div class="form-group">
			<label>Complemento:</label>
			<input type="text" name="complemento">
		</div>
		<!--form-group-->

        <div class="form-group">
			<label>Bairro:</label>
			<input type="text" name="bairro">
		</div>
		<!--form-group-->

        <div class="form-group">
			<label>UF:</label>
			<input type="text" name="uf">
		</div>
		<!--form-group-->

        <div class="form-group">
			<label>Cidade:</label>
			<input type="text" name="cidade">
		</div>
		<!--form-group-->

        <div class="form-group">
			<label>CEP:</label>
			<input type="text" name="cep">
		</div>
		<!--form-group-->

        <div class="form-group">
			<label>CNPJ:</label>
			<input type="text" name="cnpj">
		</div>
		<!--form-group-->

        <div class="form-group">
			<label>IE:</label>
			<input type="text" name="ie">
		</div>
		<!--form-group-->

        <div class="form-group">
			<label>Inscrição Municipal:</label>
			<input type="text" name="inscricao_municipal">
		</div>
		<!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao" class="acao" value="Cadastrar!">
			<img src="images/ajax-loader.gif" id="loadingImage" style="display:none" />

		</div>
		<!--form-group-->

	</form>
	<!-- form-empresa -->


</div><!--box-content-->