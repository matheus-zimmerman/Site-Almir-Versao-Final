<?php
// arquivo de cadastro
include "connect.php";
date_default_timezone_set('America/Sao_Paulo');



//variaveis pegando valores do formulário de cadastro.
$nome 		= 	$_POST['nome'];
$email 		= 	$_POST['email'];
$senha 		= 	$_POST['senha'];
$resenha	=	$_POST['repetesenha'];
$lembrete	=	$_POST['lembrete'];
$foto		=	$_FILES['foto']['name'];
$tipo		=	$_FILES['foto']['type'];

/*
echo "Nome: $nome<br>";
echo "E-mail: $email<br>";
echo "Senha: $senha<br>";
echo "Repetiçao da senha: $resenha<br>";
echo "Lembrete: $lembrete<br>";
echo "Foto: $foto<br>";
echo "Tipo: $tipo<br>";
*/

//variavel registro que será usada para ver se o usuário esta ou não habilitado a fazer o cadastro.
$registro = false;
if($nome != "" && $email != "" && $senha != "" && $lembrete !="" && $foto != "" ){
	  if($senha != $resenha){
       echo "<script>alert('Senhas diferentes');window.history.go(-1);</script>";
   }else{
      //Habilitando o usuário para o cadastro.
   	   $registro = true;

   }
}else {

   echo "<script>alert('É necessario preencher todos os campos');window.history.go(-1);</script>";
}

//fazendo uma consulta para pegar o id do usuario
$sql = mysqli_query($link,"SELECT * FROM tb_user order by id_user desc limit 1");
while($line = mysqli_fetch_array($sql)){
      $id = $line['id_user'];
      $email_user = $line['email'];

}




$id = $id  +1;
$pasta = "user".$id; 

if(file_exists("user/".$pasta)){
  echo"<script>alert('Essa pasta ja existe!'); </script>";

}else {
    mkdir("user/".$pasta,0777);
    echo "<script>alert('A pasta ".$pasta." Foi Criada com sucesso!');</script>";
}

$formatos = array (1=>'image/png',2=>'image/jpg',3=>'image/jpeg',4=>'image/gif');

//substituindo caracteres indesejados

$foto = str_replace(" ","_",$foto);
$foto = str_replace("a","a",$foto);
$foto = str_replace("é","e",$foto);
$foto = str_replace("ç","c",$foto);


//passando para minúsculas 
$foto = strtolower($foto);

$teste = array_search($tipo,$formatos);
if($teste == true){

   move_uploaded_file($_FILES['foto']['tmp_name'],"user/".$pasta."/".$foto);
}else {
      echo "<script>alert('O tipo de arquivo não é suportado!');window.history.go(-1);</script>";
}

//pegando a hora do computador
$dt = date ('Y-m-d');
$hr = date ('H:i:s');


//cadastrando o novo usuario e direcionando ele para a tela principal
if($registro == true && $email !=$email_user){
mysqli_query($link,"INSERT INTO tb_user(nome,email,senha,lembrete,foto,nivel,dt,hr)VALUES 
   ('$nome','$email','$senha','$lembrete','$foto',5,'$dt','$hr')");

   echo "<p style='text-align:center;color:#333;padding:5px';>Usuário cadastrado com sucesso!<br>";
   echo "<a href='index.php' style='color:#59f'>Ir para Home </a>   |   <a href='login.php' style='color:#59f'>login</a>";
   echo "</p>";
   //echo "<script>alert('Usuário cadastrado com sucesso!');window.location.href='index.php';<script>";
}else{
   echo "<script>window.history.go(-1);</script>";
}

?>