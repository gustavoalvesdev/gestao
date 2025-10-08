<div class="box-content">
	
    <?php 

		if (isset($_GET['pago'])) {
			$sql = MySql::conectar()->prepare("UPDATE `tb_admin.financeiro` SET status = 1 WHERE id = ?");
			$sql->execute(array($_GET['pago']));
			Painel::alert('sucesso', 'O pagamento foi quitado com sucesso!');
		}

	?>

    <h2><i class="fas fa-id-card"></i> Pagamentos Pendentes: </h2>
    <!-- fas -->
    <div class="gerar-pdf">
        <a target="_blank" href="<?= INCLUDE_PATH ?>gerar-pdf.php?pagamentos=pendentes">Gerar PDF</a>
    </div>
    <!-- gerar-pdf -->
    <div class="wraper-table">
        <table>
            <tr>
                <td>Descrição do Pagamento</td>
                <td>Cliente</td>
                <td>Valor</td>
                <td>Vencimento</td>
                <td>Enviar e-mail</td>
                <td>Marcar como pago</td>
            </tr>

        

        <?php 

				$sql = MySql::conectar();
                
                $query = $sql->query("SELECT c.id AS id_cliente, f.id AS id_pagamento, f.nome AS nome_conta, c.nome AS nome_cliente, f.valor, f.vencimento  FROM `tb_admin.financeiro` f INNER JOIN `tb_admin.clientes` c WHERE f.`status` = 0 AND f.cliente_id = c.id ORDER BY vencimento ASC");  

				$pendentes = $query->fetchAll();

                if (count($pendentes) == 0) {
                    echo '<td colspan="6">Não há nenhum pagamento pendente</td>';
                } else {
                    foreach($pendentes as $pendente) {
                        
                ?>
                    <?php 
                        $hoje = new DateTime('today');
                        $vencimento = new DateTime($pendente['vencimento']);

                        $style = ($vencimento < $hoje) ? "background-color:#F75353; color:white" : "";
                    ?>
                    <tr style="<?= $style ?>">
                        <td><?= $pendente['nome_conta'] ?></td>
                        <td><?= $pendente['nome_cliente'] ?></td>
                        <td>R$ <?= $pendente['valor'] ?></td>
                        <td><?= date('d/m/Y', strtotime($pendente['vencimento'])) ?></td>
                        <td><a class="btn edit" href="#"><i class="fa fa-envelope"></i> E-mail</a></td>
                        <td><a style="background:#00bfa5" class="btn" href="<?= INCLUDE_PATH ?>ver-pagamentos?pago=<?= $pendente['id_pagamento'] ?>"><i class="fas fa-money-bill-wave"></i> Pago</a></td>
                    </tr>						

                <?php
                    }
                }
                ?>
            </table>
    </div>

    <h2><i class="fas fa-id-card"></i> Pagamentos Concluídos: </h2>

    <div class="gerar-pdf">
        <a target="_blank" href="<?= INCLUDE_PATH ?>gerar-pdf.php?pagamentos=concluidos">Gerar PDF</a>
    </div>
    <!-- gerar-pdf -->

    <div class="wraper-table">
        <table>
            <tr>
                <td>Descrição do Pagamento</td>
                <td>Cliente</td>
                <td>Valor</td>
                <td>Vencimento</td>
            </tr>

        
        <?php 

				$sql = MySql::conectar();
                
                $query = $sql->query("SELECT f.nome AS nome_conta, c.nome AS nome_cliente, f.valor, f.vencimento  FROM `tb_admin.financeiro` f INNER JOIN `tb_admin.clientes` c WHERE f.`status` = 1 AND f.cliente_id = c.id ORDER BY vencimento ASC");  

				$concluidos = $query->fetchAll();

                if (count($concluidos) == 0) {
                    echo '<td colspan="6">Não há nenhum pagamento concluído</td>';
                } else {
                    foreach($concluidos as $concluido) {
					
                ?>
            
                    <tr>
                        <td><?= $concluido['nome_conta'] ?></td>
                        <td><?= $concluido['nome_cliente'] ?></td>
                        <td>R$ <?= $concluido['valor'] ?></td>
                        <td><?= date('d/m/Y', strtotime($concluido['vencimento'])) ?></td>
                    </tr>						

                <?php
                    }
                }
                ?>
            </table>
    </div>

</div><!--box-content-->