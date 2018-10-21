<?php  

session_start();

include_once '../model/Conexao.class.php';
include_once '../model/Contas.class.php';

$contas = new Contas();

$agencia = addslashes($_POST['agencia']);
$conta = addslashes($_POST['conta']);
$senha = md5($_POST['senha']);

if(isset($_POST['conta']) && !empty($_POST['conta'])) {
	$contas->setLogged($agencia, $conta, $senha);
}

?>