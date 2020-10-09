<?php 

require_once 'forms-config.php';
                
if ($_POST['icone_servico'] == '' || $_POST['titulo_servico'] == ''|| $_POST['descricao_servico'] == '' || $_POST['order_id'] == '') {
    $data['sucesso'] = false;
    $data['mensagem'] = 'Campos vazios não são permitidos!';
} else {
    $serviceInfo = [
        addslashes($_POST['icone_servico']),
        addslashes($_POST['titulo_servico']),
        addslashes($_POST['descricao_servico']),
        addslashes($_POST['order_id'])
    ];
    
    if(Servico::insertService($serviceInfo)){
        $data['mensagem'] = 'O cadastro do serviço foi realizado com sucesso!';
    }else{
        $data['sucesso'] = false;
        $data['mensagem'] = 'Falha ao cadastrar serviço!';
    }
}

die(json_encode($data));
