<img src="img/cy.jpg" class="logo"/>
<?php 
include "connect.php";
session_start();
@$email= $_SESSION['login'];
@$sql = mysqli_query($link,"SELECT * FROM tb_user where email = '$email'");
while($line = mysqli_fetch_array($sql)){
    $nivel = $line['nivel'];
}
if(@$nivel == 1){
    echo "<a href=logout.php class=links_top>Sair</a>";
    echo "<a href=adm.php class=links_top>Ir para adm</a>";
}else if(@$nivel == ""){
    echo "<a href=login.php class=links_top>Logar</a>";
    echo "<a href=form_cadastro.php class=links_top>Cadastre-se</a>";
}else{
    echo "<a href=logout.php class=links_top>Sair</a>";
    echo "<a href=cliente.php class=links_top>Ir para cliente</a>";
}
?>
