<?php
session_start();
require_once "../../utils/conexao.php";

$privilegio = $_SESSION['privilegio'];
$nomeusuario = $_SESSION['usuario'];
$idadm = $_SESSION["id_usuario"];
$query = "SELECT id_ong, nome, cnpj, logo, status_ong, fundacao, cidade FROM ong ORDER BY status_ong != 0";
$executar = mysqli_query($conexao, $query);

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
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/validar_ong.css">
    <link rel="stylesheet" href="estilos/nav.css">
    <link rel="stylesheet" href="estilos/post.css">
    <title>ONGS - WAAP</title>
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
                <div class="col">   

                    <?php
                        while ($dadosong = mysqli_fetch_array($executar)){
                            echo "
                                <br>
                                <br>
                                <article class='post vt-post'>
                                    <div class='row'>
                                        <div class='col-xs-12 col-sm-5 col-md-5 col-lg-4'>
                                            <div class='post-type post-img'>
                                                <img src='../../assets/ong/logo/$dadosong[logo]' id='logo_ong' width='250' height='250' class='img-responsive' alt='image post'>
                                            </div>
                                            <div class='author-info author-info-2'>
                                                <ul class='list-inline'>
                                                    <li>
                                                        <div class='info'>
                                                            <p>Visitas:</p>
                                                            <strong>0</strong>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class='col-xs-12 col-sm-7 col-md-7 col-lg-8'>
                                            <div class='caption'>
                                                <h3 class='md-heading'><td>$dadosong[nome]</td></h3>
                                                <p><th scope='col'>CNPJ: $dadosong[cnpj]</th></p>
                                                <p><th scope='col'>Cidade: $dadosong[cidade]</th></p>
                    
                                                <p><th scope='col'>Data de Fundação: $dadosong[fundacao]</th></p>
                            ";
                            if ($dadosong['status_ong'] == 0) {
                                        echo "
                                            <p><th scope='col'>Status: Aguardando aprovação</th></p>
                                                <div class='d-grid gap-2 col-6 mx-auto'>
                                                    <a class='btn btn-outline-secondary' href='validar.php?id=$dadosong[id_ong]' role='button'>Validar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                        ";
                            }else if ($dadosong['status_ong'] == 1){
                                        echo "
                                            <p><th scope='col'>Status: Aprovada</th></p>
                                                <div class='d-grid gap-2 col-6 mx-auto'>
                                                    <a class='btn btn-outline-secondary' href='validar.php?id=$dadosong[id_ong]' role='button'>Validar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                        ";
                            }else{
                                        echo "
                                            <p><th scope='col'>Status: Negada</th></p>
                                                <div class='d-grid gap-2 col-6 mx-auto'>
                                                    <a class='btn btn-outline-secondary' href='validar.php?id=$dadosong[id_ong]' role='button'>Validar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                        ";
                            }
                        }
                    ?>

                </div>
            </div>
        </div>
    </section>
</body>
</html>