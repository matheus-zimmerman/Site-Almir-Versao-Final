<?php
include "connect.php";
session_start();
$login = $_SESSION['login'];
$senha_log = $_SESSION['password'];
$sql = mysqli_query($link, "select * from tb_user WHERE email = '$login'");

if( isset($senha) || isset($nivel)){
    while($line = mysqli_fetch_array($sql)){
        $senha = $line['senha'];
        $nivel = $line['nivel'];
    }
    if($senha_log == $senha && $nivel == 1){
        echo "email: " .$login;
    }else{
        header('location:index.php');
    }
}
?>

<html>
<head>
	<title>GameSite</title>
	<link rel ="stylesheet" type="text/css" href="css/formato.css">
</head>
<body>
	<div id="box_log">
		<h1 class="titulos"style="margin-left: 2%;">Usuário logado como: <?php echo $login; ?></h1>
        <a href="index.php" style="margin-left:2%">Ir para home</a> | <a href="form_postar.php">Criar uma postagem</a> | <a href="form_scriptcss.php">Postar uma Fanart</a> | <a href="logout.php">Sair</a>

 </div>
</body>

</html>