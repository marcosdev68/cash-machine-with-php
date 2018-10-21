<?php  

session_start();

if(isset($_SESSION['login'])) {

include_once 'model/Conexao.class.php';
include_once 'model/Contas.class.php';

$contas = new Contas();

?>
<!-- Template by Marcos André -->

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">        
        <!-- Favicon -->
    	<link rel="shortcut icon" href="assets/img/icon.jpg"> 
        <title>Caixa Eletrônico - Home</title>
        <!-- Bootstrap 4 -->
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap/bootstrap.min.css">
		<!-- CSS da INDEX -->
        <link rel="stylesheet" href="assets/css/index.css">
        <!-- GoogleFonts - OpenSans -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<!-- Fontawesome 5.0-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    </head>
    <body>

        <!-- Init of Template - Marcos André -->

        <div class="d-flex">
            <nav class="sidebar">
                <ul class="list-unstyled">

                	<!-- Image of Company -->

                	<div class="image_company">
						<img src="assets/img/logo.png" class="rounded-circle rounded mx-auto d-block">
					</div><br><br>

                    <span class="text-center logo">
                        Caixa Eletrônico - PHP
                    </span><hr>

					<!-- End Img -->




					<!-- List of Menu and Icons -->

                    <li><a href=""><i class="fa fa-home"></i> Home</a></li>

                    <li><a href=""><i class="fas fa-user"></i> Menu 01 </a></li>
               
                    <li><a href=""><i class="fas fa-paste"></i> Menu 02 </a></li>

                    <li><a href=""><i class="fas fa-dolly"></i> Menu 03 </a></li>

                    <li><a href=""><i class="fas fa-handshake"></i> Menu 04</a></li>


                    <!-- Button of Logoff -->

                    <li><a href="controller/logout.php"><i class="fas fa-sign-out-alt"></i> Sair</a></li>

                    <!-- End - Button of Logoff -->

                </ul>
            </nav>

            <!-- End of Menu -->


            <div class="content p-1">
                <div class="list-group-item" style="background-color: #eaeef3">
                    
                        <div class="mr-auto p-2">
                            <h2 class="text-center"> Banco 123 <i class="fa fa-money-check-alt"></i></h2><br><br>
                        </div>

                        <!-- Iniciando a Tabela -->

                        <div class="table-responsive">
							<table class="table table-hover">
								<thead class="thead">
									<tr>
										<th>ID</th>
										<th>TITULAR</th>
										<th>AGÊNCIA</th>
										<th>CONTA</th>
										<th>SALDO</th>
										<th>AÇÕES</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($contas->listAccounts() as $account): ?>
									<tr class="tr">
										<td><?php echo $account['id']; ?></td>
										<td><?php echo $account['titular']; ?></td>
										<td><?php echo $account['agencia']; ?></td>
										<td><?php echo $account['conta']; ?></td>
										<td><?php echo $account['saldo']; ?></td>

										<!-- Formulario para Transação -->
										<td>

						<form method="POST" action="view/add_transacao.php">

							<!-- Botão para Transação -->

							<input type="hidden" name="id" value="<?=$account['id']?>">

							<button class="btn btn-warning btn-xs">
								<i class="fa fa-dollar-sign"></i>
							</button>

							<!-- Fim - Botão -->

						</form>

										</td>
										<!-- Fim Formulario -->

									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>

						<!-- Fim da Tabela -->
               
                </div>
            </div>


        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <!-- End of Template - Marcos André -->

    </body>
</html>

<!-- Template by Marcos André -->

<?php  

} else {
	header("Location: login.php?access_denied");
}

?>