<?php
session_start();
require_once "../../utils/conexao.php";
if (!isset($_SESSION['logado'])) echo "<script>
		location.href='../../'
	</script>";
$privilegio = $_SESSION['privilegio'];
$nomeusuario = $_SESSION['usuario'];
$idadm = $_SESSION["id_usuario"];
if ($privilegio != 0) { //ARRUMAR ESSA VALIDAÇAO DEPOIS (RETIRAR O || $privilegio == 1)
    echo "
            <script>
                alert('Você não tem permições administratívas para acessar essa pagina.');
				location.href= '../../'
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
    <title>Painel ADM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/estilo.css">
</head>

<body>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#conteudo-aviso'
        });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estilos/nav.css">

    <div class="sidebar">
        <div class="logo-details">
            <!--<i class='bx bxl-c-plus-plus icon'></i>-->
            <div class="logo_name">WAAP
                <span class='lead adm_painel' >Administrador</span>
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
                            <div class="name"><?php echo "A"; ?></div>
                            <div class="job"><?php echo "A"; ?></div>
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
                <div class="col">
                    <div id='aviso'>
                        <div class="jumbotron" id="camp_alterar">
                            <h1 class="display-4">Postar Avisos</h1>
                            <p class="lead">
                                Seja Bem-vindo(a), <?php echo $nomeusuario ?>, utilize essa pagina, para postar avisos as de mais ONG'S Cadastradas no Site!
                            </p>
                            <hr>
                            <br>

                            <form action='' method="POST">
                                <div class="mb-3">
                                    <h3><label for="formGroupExampleInput" class="form-label">Título</label></h3>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Digite o Título do Aviso" name="titulo">
                                    <figcaption class="figure-caption text-end">O Título aparecerá em primeiro lugar.</figcaption>
                                    </figure>
                                </div>

                                <div class="mb-3">
                                    <br>
                                    <h4><label for="formGroupExampleInput" class="form-label">Conteúdo</label></h4>
                                    <textarea name="conteudo" id="conteudo-aviso"></textarea>
                                    <figcaption class="figure-caption text-end">O Conteúdo, será o corpo do seu Aviso.</figcaption>
                                </div>
                                <p>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-outline-primary me-md-2" type="submit" name="enviar">Postar Aviso</button>
                                </div>
                                </p>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


</body>

</html>
<?php
date_default_timezone_set('America/Bahia');
if (isset($_POST['enviar'])) {
    require_once "../../utils/config.php";
    date_default_timezone_set('America/Bahia');
    $data = date('y/m/d H:i:s');
    if (empty($_POST['titulo'])) {
        echo "
                <script>
                    alert('Coloque um título para o aviso')
                    history.back();
                </script>
            ";
    } else if (empty($_POST['conteudo'])) {
        echo "
                <script>
                    alert('Preencha o contúdo do aviso')
                    history.back();
                </script>
            ";
    } else {
        $_POST['conteudo'];
        $query_enviar = "INSERT INTO avisos(admin_id, aviso_titulo, aviso_conteudo, postagem) VALUE($idadm, '$_POST[titulo]', '$_POST[conteudo]', '$data')";
        $exec_enviar = mysqli_query($conexao, $query_enviar);
        if ($exec_enviar) {
            echo "
                    <script>
                        alert('Aviso postado')
                    </script>
                ";
            unset($_POST['enviar']);
            unset($_POST['titulo']);
            unset($_POST['conteudo']);
        } else {

            echo "
                    <script>
                        alert('Erro ao enviar aviso')
                        history.back();
                    </script>
                ";
        }
    }
}
?>