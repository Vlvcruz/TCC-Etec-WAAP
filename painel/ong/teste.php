<?php
session_start();

if (!isset($_SESSION['logado'])) {
    echo "
            <script>
                location.href='../../';
            </script>
        ";
} else if ($_SESSION['privilegio'] != 1) {
    echo "
            <script>
                location.href='../../';
            </script>
        ";
} else {
    $privilegio = $_SESSION['privilegio'];

}
require_once "../../utils/conexao.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="180x180" href="../../assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="../../assets/favicon/site.webmanifest">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#descricao-ong'
        });
    </script> <!-- Nao tem -->
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/core.css">
    <title>Cadastrar Animal</title>
</head>

<body>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>
    <div class="sidebar">
        <div class="logo-details">
            <!--<i class='bx bxl-c-plus-plus icon'></i>-->
            <div class="logo_name">WAAP</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <i class='bx bx-search'></i>
                <input type="text" placeholder="Buscar...">
                <span class="tooltip">Buscar</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="pet.php">
                    <i><span class="iconify" data-icon="cil:animal"></span></i>
                    <span class="links_name">Pets</span>
                </a>
                <span class="tooltip">Pets</span>
            </li>
            <li>
                <a href="aviso.php">
                    <i class='bx bx-chat'></i>
                    <span class="links_name">Avisos</span>
                </a>
                <span class="tooltip">Avisos</span>
            </li>
            <li>
                <a href="estatisticas.php">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Estatísticas</span>
                </a>
                <span class="tooltip">Estatísticas</span>
            </li>
            <li>
                <a href="editar.php">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Gerenciar</span>
                </a>
                <span class="tooltip">Gerenciar</span>
            </li>
            <li>
                <a href="cadastro-animal.php">
                    <i><span class="iconify" data-icon="ic:outline-app-registration"></span></i>
                    <span class="links_name">Cadastrar Pet</span>
                </a>
                <span class="tooltip">Cadastrar Pet</span>
            </li>
            <li class="profile">
                <a href="../../index.php">
                    <i class='bx bx-log-out' id="log_out"></i>
                    <div class="profile-details">
                        <div class="name_job">
                            <div class="name"><?php echo $usuario[0]; ?></div>
                            <div class="job"><?php echo $usuario[1]; ?></div>
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
        searchBtn.addEventListener("click", () => {
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

    <div class="container">
        <div class="col">
            <div class="row">

                <div class="jumbotron">
                    <br>
                    <h1 class="display-5">Cadastrar Animal</h1>
                    <p class="lead">Cadastre seus 'animalzinhos' para que nossos Usuários possam velos e se tiver interesse, Adotá-los</p>
                    <hr>
                </div>

                    <?php
                        if(isset($_POST['especie'])){
                            echo"
                                <form method='POST' enctype='multipart/form-data'>

                                <div class='mb-3'>
                                    <h5><label class='form-label'>Nome Do Animal:</label></h5>
                                    <input type='text' class='form-control' name='nome'>
                                </div>
                            
                                <div class='mb-3'>
                                    <h5><label class='form-label'>Idade:</label></h5>
                                    <input type='number' class='form-control' name='idade'>
                                </div>
                        
                                <hr>
                        
                        
                                <div class='col-sm-6'>
                                    <div class='card'>
                                        <div class='card-body'>
                                                <h4><p id='selects'>Sexo:</h4>
                                                    <div class='form-check form-check-inline'>
                                                        <input class='form-check-input' value='m' type='radio' name='sexo' id='inlineRadio1'>
                                                        <h5><label class='form-check-label' for='inlineRadio1' >Macho</label></h5>
                                                    </div>
                                                    <div class='form-check form-check-inline'>
                                                        <input class='form-check-input' value='f' type='radio' name='sexo' id='inlineRadio2' >
                                                        <h5><label class='form-check-label' for='inlineRadio2' >Fêmea</label></h5>
                                                    </div>
                                                </p>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class='col-sm-6'>
                                    <div class='card'>
                                        <div class='card-body'>
                            
                                            <h4><p id='selects'>Porte Do Animal:</h4>
                                                <div class='form-check form-check-inline'>
                                                    <input class='form-check-input' value='p' type='radio' name='porte' id='inlineRadio3'>
                                                    <h5><label class='form-check-label' for='inlineRadio3'>Pequeno</label></h5>
                                                </div>
                                                <div class='form-check form-check-inline'>
                                                    <input class='form-check-input' value='m' type='radio' name='porte' id='inlineRadio4'>
                                                    <h5><label class='form-check-label' for='inlineRadio4'>Médio</label></h5>
                                                </div>
                                                <div class='form-check form-check-inline'>
                                                    <input class='form-check-input' value='g' type='radio' name='porte' id='inlineRadio5'>
                                                    <h5><label class='form-check-label' for='inlineRadio5'>Grande</label></h5>
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <hr>
                        
                                <div class='mb-3'>
                                    <h5><label for='formFile' class='form-label'>Insira uma foto do animal:</label></h5>
                                    <input class='form-control' name='foto' type='file' id='formFile' onchange='previewImagem()'><br>
                                    <img id='foto' style='width: 300px; height: 290px;''>
                                </div>
                                <script>
                                    function previewImagem() {
                                        var imagem = document.querySelector('input[name=foto]').files[0];
                                        //var preview = document.querySelector('img');
                                        var preview = document.getElementById('foto');
                        
                                        var reader = new FileReader();
                        
                                        reader.onloadend = function() {
                                            preview.src = reader.result;
                                        }
                        
                                        if (imagem) {
                                            reader.readAsDataURL(imagem);
                                        } else {
                                            preview.src = '';
                                        }
                                    }
                                </script>
                                <h4><label for='exampleDataList' class='form-label'>Historia:</label></h4>
                                <div class='form-floating'>
                                <textarea class='form-control' name='desc' placeholder='História do animal' id='floatingTextarea2' style='height: 100px'></textarea>
                                <label for='floatingTextarea2'>Conte-nos...</label>
                                <figcaption class='figure-caption'>Conte-nos mais sobre esse animalzinho fofo.</figcaption>
                                </div>
                                <br>
                        
                                <h4><label for='exampleDataList' class='form-label'>Raças</label></h4>
                                <select name='raca' class='form-select' id='datalistOptions' aria-placeholder='Selecione a raça'>
                                    <option selected>Selecione a raça</option>
                            ";
                            
                            $queryraca = "SELECT id_raca,raca FROM raca WHERE especie = $_POST[especie] ORDER BY raca ASC";
                            $execraca = mysqli_query($conexao, $queryraca);
                            while ($tableraca = mysqli_fetch_array($execraca)) {
                                echo"<option value='$tableraca[id_raca]'> $tableraca[raca]</option>";
                            }
                            echo"
                                </select>
                                <br>
                        
                                <h4><p id='selects'>Saúde:</h4>
                            ";
                            $queryvac = "SELECT id_vacina,vacina FROM vacina WHERE especie = $_POST[especie] ORDER BY vacina ASC";
                            $execvac = mysqli_query($conexao, $queryvac);
                            while ($vac = mysqli_fetch_array($execvac)) {
                                echo"
                                <div class='form-check form-switch'>
                                    <input class='form-check-input' role='switch' type='checkbox' name='vac[]' id='iflexSwitchCheckDefault' value='$vac[id_vacina]'>$vac[vacina]
                                </div>
                                ";        
                            }
                            echo"
                                <br>
                                <input type='hidden' value='$_POST[especie]' name='especie_animal'> 
                                <button class='w-100 btn btn-lg btn-primary botaosubmit' name='enviar' id='cadastrar_botao' type='submit'>Cadastrar Animal</button>
                                </form>
                            ";

                        }else{
                            echo"
                                <h2>Escolha a espécie a ser cadastrada</h2>
                                <br>
                                <h2>• Cachorro</h2>
                                
                                <form action='cadastro-animal.php' method='POST'>
                                    <input type='hidden' name='especie' value='1'>
                                    <a href='#' class='btn btn-primary pull-right marginBottom10' onclick='this.parentNode.submit()'>Selecionar</a>
                                    <br>
                                <br>
                                </form>
                                <hr/>
                                
                                <h1>• Gato</h1>
                                
                                <form action='cadastro-animal.php' method='POST'>
                                    <input type='hidden' name='especie' value='2'>
                                    <a href='#' class='btn btn-primary pull-right marginBottom10' onclick='this.parentNode.submit()'>Selecionar</a>
                                    <br>
                                    <br>
                                </form>
                            ";
                        }
                    ?>

            </div>
        </div>
    </div>

    <hr class="featurette-divider">
    <div class="container">
        <footer class="py-5">
            <div class="row">
                <div class="col-2">
                    <h5>Wanna Adopt a Pet</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Início</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Adote</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">ONGs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Doe</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Emergência</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Sobre</a></li>
                    </ul>
                </div>

                <div class="col-2">
                    <h5>Contatos</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2 p-0 text-muted">
                            <ion-icon name="mail-unread-outline"></ion-icon> contato@waap.com.br
                        </li>
                        <li class="nav-item mb-2 p-0 text-muted">
                            <ion-icon name="bug-outline"></ion-icon> bugbounty@waap.com.br
                        </li>
                        <li class="nav-item mb-2 p-0 text-muted">
                            <ion-icon name="call-outline"></ion-icon> (11) 5555-5555
                        </li>
                        <li class="nav-item mb-2 p-0 text-muted">
                            <ion-icon name="logo-whatsapp"></ion-icon> (11) 99999-9999
                        </li>
                    </ul>
                </div>

                <div class="col-4 offset-1">
                    <form method="POST">
                        <h5>Inscreva-se no nosso newsletter</h5>
                        <p>Receba noticias sobre nosso site e sobre o mundo pet.</p>
                        <div class="d-flex w-100 gap-2">
                            <label for="newsletter1" class="visually-hidden">Endereço de E-mail</label>
                            <input id="newsletter1" type="text" class="form-control" name="email" placeholder="Endereço de E-mail">
                            <button class="btn btn-primary" name="newsletter" type="submit">
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
if (isset($_POST['enviar'])) {
    if (strlen($_POST['nome']) > 30  ||  empty($_POST['nome'])) {
        echo "<script>
                    alert('Nome invalido');
                </script>
            ";
    } else if (strlen($_POST['idade']) > 2 && strlen($_POST['idade']) < 1) {
        echo "<script>
                    alert('idade invalida');
                    history.back();
                </script>
            ";
    } else if (empty($_POST['sexo'])) {
        echo "<script>
                    alert('Preencha o sexo do animal');
                    history.back();
                </script>
            ";
    } else if (empty($_POST['desc'])) {
        echo "<script>
                    alert('Preencha a Descrição do animal');
                    history.back();
                </script>
            ";
    } else if (empty($_POST['porte'])) {
        echo "<script>
                    alert('Selecione o porte do animal');
                    history.back();
                </script>
            ";
    } else if (empty($_POST['raca'])) {
        echo "<script>
                    alert('Selecione a raça do animal');
                    history.back();
                </script>
            ";
    } else {
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $sexo = $_POST['sexo'];
        $desc = $_POST['desc'];
        $porte = $_POST['porte'];
        $img = $_FILES['foto'];
        echo $especie = $_POST['especie_animal'];
        $raca = $_POST['raca'];
        $dimension = getimagesize($img['tmp_name']);
        $pegarext = pathinfo($img['name'], PATHINFO_EXTENSION);

        if(preg_match('/\.(jpg|png|jpeg)$/', $pegarext)) {
            echo "A";
        }
        
        //verificar dimensoes
            if($img['error'] == 4){
                echo"<script>
                        alert('Envie uma foto do animal');
                        history.back();
                    </script>
                ";
            }else if($img['error']==1){
				echo "A";
                echo"<script>
                        alert('Arquivo muito grande');
                        history.back();
                    </script>
                ";
            }else if(!in_array($pegarext, array('jpg', 'png', 'jpeg'))){
                echo"<script>
                        alert('Utilize apenas fotos com os formatos: jpg, png ou jpeg');
                        history.back();
                    </script>
                ";
            }else{
               
                $nomeimagem= md5(uniqid(time())).".".$pegarext;
                $up= move_uploaded_file($img['tmp_name'],"../../assets/animais/".$nomeimagem);
                $id_usuario=$_SESSION['id_usuario'];
                $queryong="SELECT id_ong FROM ong WHERE id_usuario= $id_usuario";
                $execong=mysqli_query($conexao,$queryong);
                $ong=mysqli_fetch_array($execong);
                $idong=$ong['id_ong'];      

                $sql="INSERT INTO animal (id_ong,nome,idade,sexo,historia_animal,especie,porte,foto,raca) 
                                    VALUES($idong,'$nome',$idade,'$sexo','$desc','$especie','$porte','$nomeimagem',$raca)";
				
				
                $inserir=mysqli_query($conexao,$sql);
                $ultimoid= Mysqli_insert_id($conexao);      
                foreach($_POST['vac'] as $vacina){     
                    $queryvac="INSERT INTO vacina_animal (id_animal,id_vacina)VALUES($ultimoid,$vacina)";
                    $inserevac=mysqli_query($conexao,$queryvac);
                }

                if($inserir==1){
                    echo "
                        <script>
                            alert('Animal cadastrado com sucesso!');
                            location.href='pet.php';
                        </script>";
                  }else{
                    echo $sql;
                            
                }
            } 
    }
}

?>