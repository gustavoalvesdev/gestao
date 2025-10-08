<?php 
require_once 'config.php';
?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    h2 {
        background: #333;
        color: white;
        padding: 8px;
    }

    .box {
        width: 900px;
        margin: 0 auto;
    }

    table {
        width: 900px;
        margin-top: 15px;
    }

    table td,
    table th {
        border: 1px solid #ccc;
        border-collapse: collapse;
        font-size: 14px;
        padding: 8px;
    }
</style>

<div class="box">

    <?php 

        $nome = (isset($_GET['pagamentos']) && $_GET['pagamentos'] == 'concluidos') ? 'Concluídos' : 'Pendentes';
    ?>

    <h2><i class="fas fa-id-card"></i> Pagamentos <?= $nome ?>: </h2>
    <!-- fas -->
    <div class="wraper-table">
        <table>
            <tr>
                <th>Descrição do Pagamento</th>
                <th>Cliente</th>
                <th>Valor</th>
                <th>Vencimento</th>
            </tr>
    
        
        <?php 

                $status = $_GET['pagamentos'] == 'pendentes' ? '0' : '1';

                $sql = MySql::conectar()->prepare("SELECT f.nome AS nome_conta, c.nome AS nome_cliente, f.valor, f.vencimento  FROM `tb_admin.financeiro` f INNER JOIN `tb_admin.clientes` c WHERE f.`status` = ? AND f.cliente_id = c.id ORDER BY vencimento ASC");
                
                $sql->execute(array($status));  
    
                $concluidos = $sql->fetchAll();
    
             
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
                ?>
            </table>
    </div>
    <!-- wraper-table -->
</div>
<!-- box -->
