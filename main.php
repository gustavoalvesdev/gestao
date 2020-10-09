<?php
	if(isset($_GET['loggout'])){
		Painel::loggout();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Painel de Controle</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="<?= ICONS_URL; ?>">
	<link rel="stylesheet" href="<?= INCLUDE_PATH ?>css/sweetalert2.min.css">
	<link href="<?= INCLUDE_PATH ?>css/style.css" rel="stylesheet" />
</head>
	<body>
		<base base="<?= INCLUDE_PATH ?>">
		<div class="menu">
			<div class="menu-wraper">
			<div class="box-usuario">
				<?php
					if($_SESSION['img'] == ''){
				?>
					<div class="avatar-usuario">
						<i class="fas fa-user"></i>
					</div><!--avatar-usuario-->
				<?php }else{ ?>
					<div class="imagem-usuario">
						<img src="<?php echo INCLUDE_PATH ?>uploads/<?php echo $_SESSION['img']; ?>" />
					</div><!--avatar-usuario-->
				<?php } ?>
				<div class="nome-usuario">
					<p><?php echo $_SESSION['nome']; ?></p>
					<p><?php echo pegaCargo($_SESSION['cargo']); ?></p>
				</div><!--nome-usuario-->
			</div><!--box-usuario-->
			<div class="items-menu">
				<h2><i class="fas fa-cog"></i> Configurações</h2>
				
			
					<a <?php selecionadoMenu('empresa'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>empresa">Empresa</a>
				
				<h2><i class="fas fa-comment-dollar"></i> Financeiro</h2>
				

					<a <?php selecionadoMenu('ver-pagamentos'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>ver-pagamentos">Ver Pagamentos</a>
					<a <?php selecionadoMenu('fluxo-de-caixa'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>fluxo-de-caixa">Fluxo de Caixa</a>
					<a <?php selecionadoMenu('contas-a-pagar'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>contas-a-pagar">Contas a Pagar</a>
					<a <?php selecionadoMenu('controle-financeiro'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>ver-pagamentos">Contas a Receber</a>
					<a <?php selecionadoMenu('controle-financeiro'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>ver-pagamentos">Plano de Contas</a>
					<a <?php selecionadoMenu('controle-financeiro'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>ver-pagamentos">Vencimentos</a>
					<a <?php selecionadoMenu('controle-financeiro'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>ver-pagamentos">Competências</a>
					<a <?php selecionadoMenu('controle-financeiro'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>ver-pagamentos">Contas Bancárias</a>
					<a <?php selecionadoMenu('controle-financeiro'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>ver-pagamentos">Transferências</a>
					<a <?php selecionadoMenu('controle-financeiro'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>ver-pagamentos">Recibos</a>
			
				<h2><i class="fas fa-box-open"></i> Estoque</h2>
				
				
					<a <?php selecionadoMenu('cadastrar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>cadastrar-clientes">Produtos</a>
					<a <?php selecionadoMenu('gerenciar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>gerenciar-clientes">Serviços</a>
					<a <?php selecionadoMenu('gerenciar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>gerenciar-clientes">Movimentações</a>
					<a <?php selecionadoMenu('gerenciar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>gerenciar-clientes">Armazenamento</a>
					<a <?php selecionadoMenu('gerenciar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>gerenciar-clientes">Alertas</a>
				

				<h2><i class="fas fa-paste"></i> Ordem de Serviço</h2>
				
				
					<a <?php selecionadoMenu('cadastrar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>cadastrar-clientes">Imprimir O.S.</a>
					<a <?php selecionadoMenu('gerenciar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>gerenciar-clientes">Status</a>
			

				<h2><i class="fas fa-tag"></i> Orçamento</h2>
				
				
					<a <?php selecionadoMenu('cadastrar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>cadastrar-clientes">Status</a>
					<a <?php selecionadoMenu('gerenciar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>gerenciar-clientes">Links</a>
					<a <?php selecionadoMenu('gerenciar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>gerenciar-clientes">Histórico</a>
		

				<h2><i class="fas fa-phone"></i> Contato</h2>
				
				
					<a <?php selecionadoMenu('cadastrar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>cadastrar-clientes">Clientes</a>
					<a <?php selecionadoMenu('gerenciar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>gerenciar-clientes">Fornecedores</a>
					<a <?php selecionadoMenu('gerenciar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>gerenciar-clientes">Funcionários</a>
					<a <?php selecionadoMenu('gerenciar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>gerenciar-clientes">Prestadores de Serviços</a>
			

				<h2><i class="fas fa-calendar-alt"></i> Agenda</h2>
				
				
					<a <?php selecionadoMenu('cadastrar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>cadastrar-clientes">Lembretes</a>
					<a <?php selecionadoMenu('gerenciar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>gerenciar-clientes">Compromissos</a>
					<a <?php selecionadoMenu('gerenciar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>gerenciar-clientes">Clientes</a>
					<a <?php selecionadoMenu('gerenciar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>gerenciar-clientes">Sala de Espera</a>
		
			

				<h2><i class="fas fa-chart-pie"></i> Relatórios</h2>
				
				
					<a <?php selecionadoMenu('cadastrar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>cadastrar-clientes">Financeiro</a>
					<a <?php selecionadoMenu('gerenciar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>gerenciar-clientes">Estoque</a>
					<a <?php selecionadoMenu('gerenciar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>gerenciar-clientes">Ordem de Serviço</a>
					<a <?php selecionadoMenu('gerenciar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>gerenciar-clientes">Orçamento</a>
					<a <?php selecionadoMenu('gerenciar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>gerenciar-clientes">Relatórios Prontos</a>
					<a <?php selecionadoMenu('gerenciar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>gerenciar-clientes">Personalizar</a>


				<h2><i class="fas fa-users"></i> Usuários</h2>
		
				
					<a <?php selecionadoMenu('adicionar-usuario'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>adicionar-usuario">Cadastrar Usuário</a>
					<a <?php selecionadoMenu('editar-usuario'); ?> <?php verificaPermissaoMenu(0); ?> href="<?php echo INCLUDE_PATH ?>editar-usuario">Gerenciar Usuários</a>
		

				<h2><i class="fas fa-truck"></i> Fornecedores</h2>
		
				
					<a <?php selecionadoMenu('adicionar-usuario'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>adicionar-usuario">Cadastrar Fornecedor</a>
					<a <?php selecionadoMenu('adicionar-usuario'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>adicionar-usuario">Gerenciar Fornecedores</a>
		
	
				<h2><i class="fas fa-user-tag"></i> Clientes</h2>
				
				
					<a <?php selecionadoMenu('cadastrar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>cadastrar-clientes">Cadastrar Clientes</a>
					<a <?php selecionadoMenu('gerenciar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>gerenciar-clientes">Gerenciar Clientes</a>

					
				<h2><i class="fas fa-piggy-bank"></i> Vendas</h2>
				
					<a <?php selecionadoMenu('cadastrar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>cadastrar-clientes">Cadastrar Venda</a>
					<a <?php selecionadoMenu('gerenciar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>gerenciar-clientes">Gerenciar Vendas</a>
					<a <?php selecionadoMenu('gerenciar-clientes'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>gerenciar-clientes">Parcelas a Receber</a>
			

			</div><!--items-menu-->
			</div><!--menu-wraper-->
		</div><!--menu-->

		<header>
			<div class="center">
				<div class="menu-btn">
					<i class="fa fa-bars"></i>
				</div><!--menu-btn-->

				<div class="loggout">
					<a <?php if(@$_GET['url'] == ''){ ?> style="background: #60727a;padding: 15px;" <?php } ?> href="<?php echo INCLUDE_PATH ?>"> <i class="fa fa-home"></i> <span>Página Inicial</span></a>
					<a href="<?php echo INCLUDE_PATH ?>?loggout"> <i class="fa fa-window-close"></i> <span>Sair</span></a>
				</div><!--loggout-->

				<div class="clear"></div>
			</div>
		</header>

		<div class="content">

			<?php Painel::carregarPagina(); ?>


		</div><!--content-->

		<script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
		<script src="<?php echo INCLUDE_PATH ?>js/jquery.maskMoney.js"></script>
		<script src="<?php echo INCLUDE_PATH ?>js/jquery.mask.js"></script>
		<script src="<?php echo INCLUDE_PATH ?>js/main.js"></script>
		<script src="<?php echo INCLUDE_PATH ?>js/jquery.form.min.js"></script>
		<!-- tinymce -->
		<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
		<script>
			tinymce.init({ 
				selector: '.tinymce',
				plugins: 'image',
				height: 300 
			});
		</script>
		<script src="<?= INCLUDE_PATH ?>js/helpermask.js"></script>
		<script src="<?= INCLUDE_PATH ?>js/sweetalert2.all.min.js"></script>
		<script src="<?= INCLUDE_PATH ?>js/promise-polyfill.js"></script>
		<script src="<?= INCLUDE_PATH ?>js/ajax.js"></script>
		<script src="<?= INCLUDE_PATH ?>js/constants.js"></script>
		<script src="<?= INCLUDE_PATH ?>js/accordion.js"></script>
		<?php Painel::loadJS(array('clientes.js'),'gerenciar-clientes'); ?>
		<?php Painel::loadJS(array('controleFinanceiro.js'),'editar-cliente'); ?>
	</body>
</html>