<?php
session_start();
require_once "../../utils/conexao.php";
if(!isset($_SESSION['logado'])) echo "<script>location.href='../../'</script>";
if($_SESSION['privilegio'] != 0) echo "<script>location.href='../../'</script>";
$query = "SELECT (SELECT COUNT(*) FROM usuario), (SELECT COUNT(*) FROM ong), (SELECT COUNT(*) FROM animal)";
$executar = mysqli_query($conexao, $query);
$fetch = mysqli_fetch_array($executar);
?>

<head>
    <meta charset="UTF-8">

    <link rel="apple-touch-icon" sizes="180x180" href="../../assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="../../assets/favicon/site.webmanifest">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <link rel="stylesheet" href="estilos/nav.css">
    <title>WAAP - Painel</title>
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
            <div class="col">
                <div class="row">

                    <div class="row">
                        <div class="col">
                            <div class="jumbotron" id="camp_alterar">
                                <h1 class="display-4" align='center'>Painel WAAP</h1>

                            </div>
                            <div id='alert'>
                                <?php
                                $query = "SELECT id_ong, nome FROM ong WHERE status_ong = 0";
                                $exec = mysqli_query($conexao, $query);
                                $rowsong = mysqli_num_rows($exec);
                                if ($rowsong == 0) {
                                    echo '
                                <div class="alert alert-success" role="alert">
                                    <i class="bi bi-check2-all"></i> Nenhuma ONG aguarda aprovação!
                                </div>
                            ';
                                } else {
                                    echo "
                                <div class='alert alert-warning' role='alert'>
                                    <i class='bi bi-exclamation-triangle-fill'></i> Existem $rowsong ONG(s) para serem aprovadas
                                </div>
                                
                            ";
                                }
                                ?>
                            </div>
                            <hr>


                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="img/user.png" class="img-fluid rounded-start" alt="usuarios" width="250" height="250">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title ">Usuários Cadastrados:</h5>
                                            <h3>
                                                <p class="card-text ">• <?php echo "$fetch[0]" ?> Usuários</p>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="img/ong.png" class="img-fluid rounded-start" alt="ONG" width="250" height="250">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title ">ONG'S Cadastradas:</h5>
                                            <h3>
                                                <p class="card-text ">• <?php echo "$fetch[1]" ?> ONG'S</p>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3 ultimocard" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="img/animaisperfil.jpeg" class="img-fluid rounded-start" alt="Animais" width="250" height="250">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title ">Animais Cadastrados</h5>
                                            <h3>
                                                <p class="card-text ">• <?php echo "$fetch[2]" ?> Animais</p>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>