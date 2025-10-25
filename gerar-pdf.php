<?php 

require __DIR__ . '/vendor/autoload.php';

ob_start();

require 'templateFinanceiro.php';

$conteudo = ob_get_contents();

ob_end_clean();

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($conteudo);
$mpdf->Output();
