<?php 

require_once 'forms-config.php';

$nome = $_POST['nome'];
$imagem = $_FILES['imagem'] ?? '0';

if($nome == '' || $imagem == '0'){

    $data['sucesso'] = false;
    $data['mensagem'] = 'Todos os campos devem ser preenchidos!';

}else{

    //Podemos cadastrar!
    if(Painel::imagemValida($imagem) == false){
        $data['sucesso'] = false;
        $data['mensagem'] = 'O formato especificado não está correto!';
    }else{
        //include('../../classes/lib/WideImage.php');
        $imagem = Painel::uploadFile($imagem);
        $arr = ['nome'=>$nome,'slide'=>$imagem,'order_id'=>'0','nome_tabela'=>'tb_site.slides'];
        Painel::insert($arr);
        $data['mensagem'] = 'O cadastro do slide foi realizado com sucesso!';
    }
}
				
die(json_encode($data));
