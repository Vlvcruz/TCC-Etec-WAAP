<?php
session_start();
require_once "../../utils/conexao.php";
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
    $query = "SELECT u.nome, e.nome, e.id_ong FROM usuario u INNER JOIN ong e ON e.id_usuario = u.id_usuario WHERE u.id_usuario = $_SESSION[id_usuario]";
    $sql = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_array($sql);
}
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
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
<div class="sidebar">
        <div class="logo-details">
            <!--<i class='bx bxl-c-plus-plus icon'></i>-->
            <div class="logo_name">WAAP
            <br>
                <span class='lead'>Diretor<span class="dir">(a)</span></span>
            </div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <i class='bx bx-search'></i>
                <input type="text" placeholder="Buscar...">
                <span class="tooltip">Buscar</span>
            </li>
            <li>
                <a href="index.php">
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

    <section class='home-section'>
        <div class="container">
            <div class="col">
                <div class="row">
                    <?php

                        if(isset($_POST['especie'])){                        
                            switch($_POST['especie']){
                                case 1: 
                                    echo"
                                        <div class='jumbotron'>
                                            <br>
                                            <h1 class='display-5'>Cadastrar Animal</h1>
                                            <p class='lead'>Cadastre seus 'animalzinhos' para que nossos Usuários possam velos e se tiver interesse, Adotá-los</p>
                                            <hr>
                                            <h2>Espécie a ser cadastrada: Cachorro</h2>
                                        </div>
                                    ";
                                break;
                                case 2:
                                    echo"
                                        <div class='jumbotron'>
                                            <br>
                                            <h1 class='display-5'>Cadastrar Animal</h1>
                                            <p class='lead'>Cadastre seus 'animalzinhos' para que nossos Usuários possam velos e se tiver interesse, Adotá-los</p>
                                            <hr>
                                            <h2>Espécie a ser cadastrada: Gato</h2>
                                        </div>
                                    
                                    ";
                                break;
                                default:
					                echo "								
                                        <div class='jumbotron'>
                                            <br>
                                            <h1 class='display-5'>Cadastrar Animal</h1>
                                            <p class='lead'>Cadastre seus 'animalzinhos' para que nossos Usuários possam velos e se tiver interesse, Adotá-los</p>
                                            <hr>
                                            <h2>Escolha uma espécie a ser cadastrada...</h2>
                                        </div>					
							        ";
					            break;
                            }
                    }else{
                        echo "								
                            <div class='jumbotron'>
                                <br>
                                <h1 class='display-5'>Cadastrar Animal</h1>
                                <p class='lead'>Cadastre seus 'animalzinhos' para que nossos Usuários possam velos e se tiver interesse, Adotá-los</p>
                                <hr>
                                <h2>Escolha uma espécie a ser cadastrada...</h2>
                            </div>					
						";
                    }
      
                    ?>
 
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
                                        <div class='card-body-pet'>
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
                                        <div class='card-body-pet'>
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
                                <h2>• Cachorro</h2>
                                <form action='cadastro-animal.php' method='POST'>
                                    <input type='hidden' name='especie' value='1'>
                                    <a href='#' class='btn btn-primary pull-right marginBottom10' onclick='this.parentNode.submit()'>Selecionar</a>
                                    <br>
                                    <br>
                                </form>
                                <br>
                                <hr/>
                                
                                <h1>• Gato</h1>
                                
                                <form action='cadastro-animal.php' method='POST'>
                                    <input type='hidden' name='especie' value='2'>
                                    <a href='#' class='btn btn-primary pull-right marginBottom10' onclick='this.parentNode.submit()'>Selecionar</a>
                                </form>
                            ";
                        }
                    ?>
                </div>
            </div>
        </div>
        <br>
    </section>
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
        $especie = $_POST['especie_animal'];
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