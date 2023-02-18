<?php
session_start();
if (isset($_SESSION['logado'])) {
	$idusuario = $_SESSION['id_usuario'];
	$privilegio = $_SESSION['privilegio'];
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
	<link rel="manifest" href="assets/favicon/site.webmanifest">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link rel="stylesheet" href="css/styles.css">
	<title>Home - WAAP</title>
</head>

<body>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script>
		$('.carousel').carousel({
			interval: 900
		})
	</script>
	<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
		<a href="#" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
			<img src="assets/Logoparalela.png" class="logo" alt="Logo" title="Logo Waap">
		</a>

		<ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
			<li><a href="#" class="nav-link px-2 link-dark">Início</a></li>
			<li><a href="adocao/" class="nav-link px-2 link-dark">Adote</a></li>
			<li><a href="ong/ongs.php" class="nav-link px-2 link-dark">ONGs</a></li>
			<li><a href="sobre-nos/" class="nav-link px-2 link-dark">Sobre Nós</a></li>
		</ul>
		<?php
		if (isset($privilegio)) {
			switch ($privilegio) {
				case 0:
					echo '
								<div class="col-md-3 menus-nav text-end">
									<a href="painel/admin/" class=""><button type="button" class="btn btn-outline-primary me-2">Painel</button></a>
									<a href="sair.php" class=""><button type="button" class="btn btn-primary"><ion-icon name="log-out-outline"></ion-icon></button></a>
								</div>
							';
					break;
				case 1:
					echo '								
								<div class="col-md-3 menus-nav text-end">
									<a href="painel/ong/" title="Painel" class=""><button type="button" class="btn btn-outline-primary me-2"><ion-icon name="home-outline"></ion-icon> Minha ONG</button></a>
									<a href="gerenciamento-conta/dados.php" title="Configurações" class=""><button type="button" class="btn btn-outline-primary me-2"><ion-icon name="settings-outline"></ion-icon></button></a>
									<a href="sair.php" title="Sair" class=""><button type="button" class="btn btn-primary"><ion-icon name="log-out-outline"></ion-icon></button></a>
								</div>								
							';
					break;
				default:
					echo "								
								<div class='col-md-3 menus-nav text-end'>
									<a href='gerenciamento-conta/dados.php' title='Configurações' class=''><button type='button' class='btn btn-outline-primary me-2'><ion-icon name='settings-outline'></ion-icon></button></a>
									<a href='sair.php' title='Sair' class=''><button type='button' class='btn btn-primary'><ion-icon name='log-out-outline'></ion-icon></button></a>
								</div>								
							";
					break;
			}
		} else {
			echo '
						<div class="col-md-3 menus-nav text-end">
						<a href="login/" class=""><button type="button" class="btn btn-outline-primary me-2">Login</button></a>
						<a href="cadastro/" class=""><button type="button" class="btn btn-primary">Cadastre-se</button></a>
						</div>
					';
		}
		?>
		<div class="col-md-3 text-end">
		</div>
	</header>
	<div id="banner">
		<div id='title'>
			<p>Wanna Adopt a Pet</p>
			<h4>"Adote novas experiências"</h4>
			<?php
			if (isset($_SESSION['logado'])) {
				if ($_SESSION['logado'] != true) {
					echo "
							<p><a href='cadastro/' class='btn btn-primary my-2'>Cadastre-se agora</a></p>
							";
				} else {
					echo "
							<p><a href='adocao/' class='btn btn-primary my-2'>Adote Agora!</a></p>
							";
				}
			} else {
				echo "
							<p><a href='cadastro/' class='btn btn-primary my-2'>Cadastre-se agora!</a></p>
							";
			}
			?>

		</div>
	</div>
				<div class="row ajude py-lg-5">
					<div class="col-lg-6 col-md-8 mx-auto">
						<h1 class="fw-light">Ajude a Ajudar</h1>
						<p class="lead text-muted">Seja bem-vindo ao nosso ao Wanna adopt a Pet tem como Objetivo principal ajudar os animais de rua ou que sofrerem maus-tratos, por isso nossa equipe desenvolveu um site para que junto a comunidade possamos contribuir para diminuir o número de pets abandonados. Ajude a Ajudar, doe para ONG'S ou para o Projeto WAAP.</p>
						<p class='ajude'>
							<a href="ong/ongs.php" class="btn  btn-primary my-2">Doar para ONGs</a>
							<a href="#" class="btn btn-secondary my-2">Doar para o WAAP</a>
						</p>
					</div>
				</div>
				<hr>
				<div class="row dicas py-lg-5">
					<div class="col-lg-6 col-md-8 mx-auto">
						<p class="fw-light">Dicas De Doação</p>
						<div id='sliders'>
							<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner">
									<div class="carousel-item active">
										<img class="d-block w-100" src="assets/img1.png">
									</div>
									<div class="carousel-item">
										<img class="d-block w-100" src="assets/img2.png">
									</div>
									<div class="carousel-item">
										<img class="d-block w-100" src="assets/img3.png">
									</div>
									<div class="carousel-item">
										<img class="d-block w-100" src="assets/img4.png">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>
			
	<div class="container">
		<div class="col">
			<div class="row">
				<div id="helpAdocao">
					<p class="fw-light">Como Adotar um Pet ?</p>
					<br>
					<div class="row row-cols-1 row-cols-md-3 g-4">
						<div class="col">
							<div class="card border-white" width="16px" height="16px">
							<svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="currentColor" class="bi bi-window-fullscreen icone_home" viewBox="0 0 16 16">
  								<path d="M3 3.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Zm1.5 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Zm1 .5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Z"/>
  								<path d="M.5 1a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 .5.5h15a.5.5 0 0 0 .5-.5v-13a.5.5 0 0 0-.5-.5H.5ZM1 5V2h14v3H1Zm0 1h14v8H1V6Z"/>
							</svg>
							<div class="card-body">
								<h5 class="card-title text-center">A Página Adote…</h5>
								<p class="card-text">Na página adote você poderá encontrar todos pet's, cadastrados no nosso ‘website’, tendo uma variedade incrível de raças e portes… 
									Clique <a href="adocao/index.php">aqui</a>, para ir conferir nossos "animaizinhos" !!</p>
							</div>
							
							</div>
						</div>
						<div class="col">
							<div class="card border-white">
							<svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="currentColor" class="bi bi-card-checklist icone_home" viewBox="0 0 16 16">
  								<path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
  								<path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
							</svg>
							<div class="card-body">
								<h5 class="card-title text-center">Conferiu os pet. Agora é só escolher.</h5>
								<p class="card-text">Algum pet Chamou sua atenção? Legal no botão “Veja-mais”, você consegue ver todas as informações do animal, como o porte, sexo, raça…</p>
							</div>
							
							</div>
						</div>
						<div class="col">
							<div class="card border-white">
							<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-telephone-outbound icone_home" viewBox="0 0 16 16">
  								<path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z"/>
							</svg>
							<div class="card-body">
								<h5 class="card-title text-center">Hora de Adotar!</h5>
								<p class="card-text">Ainda na página das informações do pet, Você tem a opção de ver os dados da protetora do animal… Agora só basta entrar em contato com a protetora e informar o interesse no animal!</p>
								
							</div>
							</div>
							<br>
							<br>
						</div>
					</div>
				</div>
				<hr>
				<!-- Fim Help Adotar -->

				<div class="card mb-3 border-white">
					<img src="assets/pethome7jpg.jpg" height="550px" class="card-img-top" alt="...">
					<div class="card border-white">
						<p class="card-text">
							<?php 
								require_once"utils/conexao.php";
								$query="SELECT * FROM `animal`";
								$con = mysqli_query($conexao, $query);
								$contwo = mysqli_num_rows($con);
								$resultt = $contwo;
									echo"
										<div class='card text-center border-white'>
											<div class='card-body border-white'>
												<h3 class='card-title text-center text_petsc'>Patas Cadastradas</h3>
									  			<p class='card-text text_petsc_result'>$resultt</p>
												<br>
												<div class='d-grid gap-2'>
													<a href='adocao/index.php' class='btn btn-outline-primary'>Veja nossos Pets</a>
												</div>
											</div>
										</div>
									";
							?>
						</p>
					</div>
				</div>



			</div>
		</div>
	</div>


	<hr>
	<div class="container">
		<footer class="py-5">
			<div class="row">
				<div class="col-22">
					<h5>Wanna Adopt a Pet</h5>
					<ul class="nav flex-column">
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Início</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Adote</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">ONGs</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Sobre</a></li>
					</ul>
				</div>

				<div class="col-2">
					<h5>Contatos</h5>
					<ul class="nav flex-column">
						<li class="nav-item mb-2 p-0 text-muted">
							<ion-icon name="mail-unread-outline"></ion-icon> contato@waap.com
						</li>
						<li class="nav-item mb-2 p-0 text-muted">
							<ion-icon name="bug-outline"></ion-icon> bounty@waap.com
						</li>
						<li class="nav-item mb-2 p-0 text-muted">
							<ion-icon name="call-outline"></ion-icon> (11) 3628-5334
						</li>
						<li class="nav-item mb-2 p-0 text-muted">
							<ion-icon name="logo-whatsapp"></ion-icon> (11) 99805-5313
						</li>
					</ul>
				</div>

				<div class="col-4 offset-1">
					<form method='post'>
						<h5>Inscreva-se no nosso newsletter</h5>
						<p>Receba notícias sobre nosso site e sobre o mundo pet.</p>
						<div class="d-flex w-100 gap-2">
							<label for="newsletter1" class="visually-hidden">Endereço de E-mail</label>
							<input id="newsletter1" type="text" name='emailnews' class="form-control" placeholder="Endereço de E-mail">
							<button class="btn btn-primary" name='news' type="submit">
								<ion-icon class="iconfooter" name="send-outline"></ion-icon>
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="d-flex justify-content-between py-4 my-4 border-top">
				<p>© 2021 Wanna Adopt a Pet, Todos direitos reservados.</p>
				<ul class="list-unstyled d-flex">
					<li class="ms-3"><a class="link-dark" href="#">
							<ion-icon class="iconfooter" name="logo-instagram"></ion-icon>
						</a></li>
					<li class="ms-3"><a class="link-dark" href="#">
							<ion-icon class="iconfooter" name="logo-facebook"></ion-icon>
						</a></li>
					<li class="ms-3"><a class="link-dark" href="#">
							<ion-icon class="iconfooter" name="logo-twitter"></ion-icon>
						</a></li>
				</ul>
			</div>
		</footer>
	</div>
</body>

</html>
<?php
if (isset($_POST['news'])) {
		$emailnews = mysqli_real_escape_string($conexao, $_POST['news']);
        $token = md5(date('Y-m-d H:i:s'));
        $sql= "INSERT INTO newsletter(email,token) VALUES('$emailnews', '$token')";
        $executar = mysqli_query($conexao,$sql);
	if ($executar) {
		echo "<script> 
                alert('Cadastrado com sucesso!');
				location.href=location.href;
            </script>";
	} else {
		echo "<script> 
                alert('Houve um erro de conexão!');
				location.href=location.href;
            </script>";
	}
}
?>