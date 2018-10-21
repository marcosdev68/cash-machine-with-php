<?php  

session_start();

include_once '../model/Conexao.class.php';
include_once '../model/Contas.class.php';

$contas = new Contas();

$tipo = addslashes($_POST['tipo']);
$valor = str_replace(",", ".", $_POST['valor']);
$valor = floatval($valor);

if(isset($_POST['valor'])) {
	$contas->setTransaction($tipo, $valor);
}

header("Location: ../index.php?transaction_success");

?>