<?php
include "connect.php";
session_start();//inicia ou recupera uma sessao que esta em aberto
$login = $_SESSION['login'];//email do usuario
$senha_log = $_SESSION['password']; //senha do usuario
$sql = mysqli_query($link,"select * from tb_user WHERE email = '$login'");
while($line = mysqli_fetch_array($sql)){
   $senha = $line['senha'];
   $nivel = $line['nivel'];
   $foto = $line['foto'];
   $id = $line['id_user'];

}
if($senha_log == $senha && $nivel == 1){


}else {
    header('location:index.php');

}


?>

<html>
<head>
	<title>Crunchyroll postagem</title>
	<link rel ="stylesheet" type="text/css" href="css/formato.css">
</head>
<body>
  <div id="box_form">
		<h1 class="titulos"style="margin-left: 10%;">Formulário de script css
    </h1>
     <form action="postar_script.php" method="POST" enctype="multipart/form-data">
       <input type="text" name="titulo" class="campos_cad"placeholder="Digite o título da postagem">
       <input type="file" name="foto" class="campos_cad">
       <textarea name="conteudo" class="campos_cad"placeholder="Digite aqui o conteúdo..." style="height: 200px"maxlength="280"></textarea>
   <div id="botoes">
       <input type="submit" value="Publicar" class="bt_cad">
       <input type="reset" value="Limpar" class="bt_cad">
   </div>
     </form>
   <div class="botoes">
     <a href="index.php"class="form_link">&larr; Voltar para a página principal </a> 
     <a href="form_postar.php"class="form_link" style="margin-left: 20px">Ir para form postar &rarr;</a>
 </div>

 </div>
</body>

</html>


