<?php
include "connect.php";
session_start();//inicia ou recupera uma sessão que esta em aberto 
$login = $_SESSION['login'];// email do usuario
$senha_log = $_SESSION['password'];
$sql = mysqli_query($link, "select * from tb_user WHERE email = '$login'");
while($line = mysqli_fetch_array($sql)){
    $senha = $line['senha'];
    $nivel = $line['nivel'];
    $foto = $line['foto'];
    $id = $line['id_user'];
    $nome = $line['nome'];

}
if($senha_log == $senha && $nivel > 1){
    echo "E-mail: ".$login;
}else{
    header('location:index.php');
}
?>

<html>
<head>
	<title>Crunchyroll</title>
	<link rel ="stylesheet" type="text/css" href="css/formato.css">
</head>
<body>
	<div id="box_log">
		<h1 class="titulos"style="margin-left: 2%">Usuário logado como: <?php echo $login; ?></h1>
        <h1 class="titulos"style="margin-left: 2%">Nome do usuário: <?php echo $nome; ?></h1>
        <a href="index.php" style="margin-left:2%">Ir para home </a> |
        <a href="logout.php">Sair</a>

 </div>
</body>

</html>