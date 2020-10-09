<?php 

require_once 'forms-config.php';

if(Painel::insert($_POST)){
    $data['mensagem'] = 'O cadastro do depoimento foi realizado com sucesso!';
}else{
    $data['sucesso'] = false;
    $data['mensagem'] = 'Campos vázios não são permitidos!';
}

die(json_encode($data));
