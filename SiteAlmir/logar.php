<?php

include "connect.php";
$email = $_POST['email'];
$senha = $_POST['senha'];

if($email != "" && $senha != "") {
    $sql = mysqli_query($link, "SELECT * FROM tb_user WHERE email = '$email'");
    $registro = mysqli_num_rows($sql);
    while($line = mysqli_fetch_array($sql)){
        $senha_user = $line['senha'];
        $nivel = $line['nivel'];
    }
    if($registro){
        if($senha_user == $senha){
            session_start();
            $_SESSION['login'] = $email;
            $_SESSION['password'] = $senha;
            if($nivel == 1){
               header('location:adm.php');
            }else{
                header('location:cliente.php');
            }

        }else{
            echo "Senha não confere com o que tem no cadastro.";
            echo "<a href='login.php'> Voltar a tela de login</a> ";
        }
    }else{
        echo "Você não possui cadastro. Deseja se cadastrar?";
        echo "<a href='form_cadastro.php'>Cadastre-se</a>"; 
    }
}else{
    echo "É necessário preencher todos os campos e possuir um cadastro";
    header('location:login.php?valor=1');
}
?>