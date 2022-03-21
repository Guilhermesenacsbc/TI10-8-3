<?php

include_once("../model/conexao.php");
include_once("../model/usuarioModel.php");

$email = $_POST["email"];
$senha = $_POST["senha"];
$acesso = verificaAcesso($conn,$email,$senha);

if($acesso === $email){
    header("Location:../view/indexAdm.php");

}else{
    header("Location:../view/index.php");

}


?>