<?php  

class Contas extends Conexao {

	// Metodo para efetuar Transação
	public function setTransaction($tipo, $valor) {
		$pdo = parent::get_instance();
		$sql = "INSERT INTO historico (id_conta, tipo, valor, data_operacao) VALUES (:id_conta, :tipo, :valor, NOW())";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(":id_conta", $_SESSION['login']);
		$sql->bindValue(":tipo", $tipo);
		$sql->bindValue(":valor", $valor);
		$sql->execute();

		if($tipo == 'Deposito') {
			// Deposito
			$sql = "UPDATE contas SET saldo = saldo + :valor WHERE id = :id";
			$sql = $pdo->prepare($sql);
			$sql->bindValue(":valor", $valor);
			$sql->bindValue(":id", $_SESSION['login']);
			$sql->execute();
		} else {
			// Retirada
			$sql = "UPDATE contas SET saldo = saldo - :valor WHERE id = :id";
			$sql = $pdo->prepare($sql);
			$sql->bindValue(":valor", $valor);
			$sql->bindValue(":id", $_SESSION['login']);
			$sql->execute();
		}

	}

	// Metodo para listar Contas
	public function listAccounts() {
		$pdo = parent::get_instance();
		$sql = "SELECT * FROM contas ORDER BY id ASC";
		$sql = $pdo->prepare($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
			return $sql->fetchAll();
		}

	}

	// Metodo para Listar Historico
	public function listHistoric($id) {
		$pdo = parent::get_instance();
		$sql = "SELECT * FROM historico WHERE id_conta = :id_conta";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(":id_conta", $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			return $sql->fetchAll();
		}

	}

	// Metodo para pegar informações de cada conta
	public function getInfo($id) {
		$pdo = parent::get_instance();
		$sql = "SELECT * FROM contas WHERE id = :id";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			return $sql->fetchAll();
		}

	}

	// Metodo para fazer Login
	public function setLogged($agencia, $conta, $senha) {
		$pdo = parent::get_instance();
		$sql = "SELECT * FROM contas WHERE agencia = :agencia AND conta = :conta AND senha = :senha";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(":agencia", $agencia);
		$sql->bindValue(":conta", $conta);
		$sql->bindValue(":senha", $senha);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$sql = $sql->fetch();

			$_SESSION['login'] = $sql['id'];

			header("Location: ../index.php?login_success");
			exit;

		} else {
			header("Location: ../login.php?not_login");
		}

	}

	// Metodo para fazer Logout
	public function logout() {
		unset($_SESSION['login']);
	}

}

?>