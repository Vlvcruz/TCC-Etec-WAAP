<?php
    require_once ("conexao.php");
    function newsletter($emailnews){
        require_once ("conexao.php");
        $emailnews = mysqli_real_escape_string($conexao, $emailnews);
        $token = md5(date('Y-m-d H:i:s'));
        $sql= "INSERT INTO newsletter(email,token) VALUES('$emailnews', '$token')";
        $executar = mysqli_query($conexao,$sql);
        if($executar){
            return true;
        } else {
            echo $sql;
            return false;
        }
    }
    
?>