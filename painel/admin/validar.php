<?php
session_start();
require_once "../../utils/config.php";
require_once "../../utils/conexao.php";
$idusuario = $_SESSION['id_usuario'];
$privilegio = $_SESSION['privilegio'];
$nomeusuario = $_SESSION['usuario'];
$idong = $_GET['id'];


$query = "SELECT o.*,u.nome diretor,u.email emaildiretor, u.cpf cpf FROM ong o INNER JOIN usuario u ON o.id_usuario=u.id_usuario WHERE o.id_ong = $idong";
$exec = mysqli_query($conexao, $query);
if ($exec) {
	if (mysqli_num_rows($exec) == 1) {
		$fetch = mysqli_fetch_array($exec);
	}
}
if ($privilegio != 0) { //ARRUMAR ESSA VALIDAÇAO DEPOIS (RETIRAR O || $privilegio == 1)
	echo "
			<script>
				location.href= '../../';
			</script>
		";
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="apple-touch-icon" sizes="180x180" href="../../assets/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../../assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../../assets/favicon/favicon-16x16.png">
	<link rel="manifest" href="../../assets/favicon/site.webmanifest">

	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link rel="stylesheet" href="estilos/nav.css">
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<title><?php echo $fetch[2] ?> - WAAP</title>
</head>

<body>


	<div class="sidebar">
		<div class="logo-details">
			<!--<i class='bx bxl-c-plus-plus icon'></i>-->
			<div class="logo_name">WAAP
				<span class='lead adm_painel'>Administrador</span>
			</div>
			<i class='bx bx-menu' id="btn"></i>
		</div>
		<ul class="nav-list">
			<li>
				<a href="./">
					<i class='bx bx-grid-alt'></i>
					<span class="links_name">Dashboard</span>
				</a>
				<span class="tooltip">Dashboard</span>
			</li>
			<li>
				<a href="aviso.php">
					<i class='bx bx-chat'></i>
					<span class="links_name">Postar avisos</span>
				</a>
				<span class="tooltip">Postar aviso</span>
			</li>
			<li>
				<a href="ongs.php">
					<i class='bx bx-list-check' id="valid"></i>
					<span class="links_name">Validar ONGs</span>
				</a>
				<span class="tooltip">Validar</span>
			</li>

			<li class="profile">
				<a href="../../index.php">
					<i class='bx bx-log-out' id="log_out"></i>
					<div class="profile-details">
						<div class="name_job">
							<div class="name"><?php echo $_SESSION['usuario']; ?></div>
							<div class="job"><?php echo "Administrador"; ?></div>
						</div>
					</div>
				</a>
			</li>
		</ul>
	</div>
	<script>
		let sidebar = document.querySelector(".sidebar");
		let closeBtn = document.querySelector("#btn");
		let searchBtn = document.querySelector(".bx-search");

		closeBtn.addEventListener("click", () => {
			sidebar.classList.toggle("open");
			menuBtnChange();
		});

		function menuBtnChange() {
			if (sidebar.classList.contains("open")) {
				closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
			} else {
				closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
			}
		}
	</script>
	<section class="home-section">
		<div class="container">
			<div class="row">
				<table class="table table-hover">
					<thead class="table-light">
						<th scope="row">Informações de Cadastro</th>
						<td></td>
					</thead>
					<thead>
						<tr>
							<td><?php echo "<img src='../../assets/ong/logo/$fetch[logo]'>"; ?></td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row" class="table-active">Nome</th>
							<td><?php echo $fetch['nome']; ?></td>
						</tr>
						<tr>
							<th scope="row" class="table-active">CNPJ</th>
							<td><?php echo $fetch["cnpj"]; ?></td>
						</tr>
						<tr>
							<th scope="row" class="table-active">Fundação</th>
							<td><?php
								$fundacao = explode('-', $fetch['fundacao']);
								$fundacao = $fundacao[2] . "/" . $fundacao[1] . "/" . $fundacao[0];

								echo $fundacao ?></td>
						</tr>

						<?php
						if ($fetch["complemento"] != '') {
							echo "<tr>
						<th scope='row' class='table-active'>Complemento</th>
						<td> $fetch[complemento] </td>
					</tr>";
						}

						if ($fetch["referencia"] != '') {
							echo "<tr>
						<th scope='row' class='table-active'>Referencia</th>
						<td> $fetch[referencia] </td>
					</tr>";
						}
						if ($fetch["email"] != '') {
							echo "<tr>
						<th scope='row' class='table-active'>Email</th>
						<td> $fetch[email] </td>
					</tr>";
						}
						if ($fetch["tel_fixo"] != '') {
							echo "<tr>
						<th scope='row' class='table-active'>Telefones</th>
						<td> $fetch[tel_fixo]";
							if ($fetch['whatsapp'] != '') {
								echo $fetch['whatsapp'];
							}
							echo "</td>
					</tr>";
						}
						if ($fetch["descricao_ong"] != '') {
							echo "<tr>
						<th scope='row' class='table-active'>Missão</th>
						<td> $fetch[descricao_ong] </td>
					</tr>";
						}
						echo "
						<tr>
							<th scope='row' class='table-active'>Diretor(a)</th>
							<td> $fetch[diretor] </td>
						</tr>
						<tr>
							<th scope='row' class='table-active'>E-Mail do Diretor</th>
							<td> $fetch[emaildiretor] </td>
						</tr>
						<tr>
							<th scope='row' class='table-active'>CPF</th>
							<td> $fetch[cpf] </td>
						</tr>
						";
						?>
						<tr>
							<th scope="row" class="table-active">Ação</th>
							<td class="align-top">
								<form action="" method='POST'>
									<button type="submit" name="aprovar" class="btn btn-link">Aprovar</button>
									<button type="submit" name="negar" class="btn btn-link">Negar</button>
								</form>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section>
</body>

</html>
<?php
if (isset($_POST['aprovar'])) {
	$sql_aprovar = "UPDATE ong SET status_ong = 1 WHERE id_ong = $idong";
	$exec_atualizar = mysqli_query($conexao, $sql_aprovar);
	echo $update_usuario = "UPDATE usuario SET privilegio = 1 WHERE id_usuario = $fetch[1]";
	$exec_usuario = mysqli_query($conexao, $update_usuario);
	$sql = "SELECT u.email, u.nome,o.nome as ong FROM ong o INNER JOIN usuario u ON u.id_usuario = o.id_usuario WHERE id_ong = $idong";
	$exe = mysqli_query($conexao, $sql);
	$fetch = mysqli_fetch_array($exe);
	$dados = array(
		'email' => $fetch['email'],
		'nome' => $fetch['nome'],
		'ong' => $fetch['ong']
	);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://$host:$port/waap_oficial/web3/utils/ongaprovada.php");
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $dados);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$data = curl_exec($ch);
	curl_close($ch);

	if ($exec_atualizar) {
		$_POST['aprovar'] = null;
		echo "
				<script>
					alert('Ong aprovada!');
					location.href='index.php'
				</script>
			";
	}
}
if (isset($_POST["negar"])) {
	$sql_negar = "UPDATE ong SET status_ong = 2 WHERE id_ong = $idong";
	$exec_negar = mysqli_query($conexao, $sql_negar);
	if ($exec_negar) {
		$_POST['negar'] = null;
		echo "
				<script>
					alert('Ong negada!');
					location.href='index.php'
				</script>
			";
	}
}
?>