<div id="conteudo_principal">
      <h1 class="titulos">Página de Fanart</h1>
    <?php 
    include "connect.php";
    $sql = mysqli_query($link, "select * from tb_postagens where page = 2 order by id_post desc");
    while($line = mysqli_fetch_array($sql)){
      $titulo = $line['titulo'];
      $imagem = $line['imagem'];
      $conteudo = $line['texto'];
      $data = $line['dt'];
      $id_post = $line['id_post'];
    
    
    
    ?>


      <div class="postagens">
       <h1 class="titulos"><?php echo $titulo; ?></h1>
        <img src="postagens/<?php echo "post".$id_post."/".$imagem; ?>" clas="imagem">
        <p class="paragrafo"><?php echo $conteudo; ?></p><br>
        <span class="data"><?php echo date('d/m/Y', strtotime($data)); ?></span>

      </div>

  <?php 
    }
  ?>

</div>



<div id="recentes">
	<h1 class="titulos">Recentes</h1>
  <div class="postagens_recentes">
    <?php 
    $contar = 0;

    $sql = mysqli_query($link, "select * from tb_postagens where page = 2 order by id_post desc");
    while($line = mysqli_fetch_array($sql) and $contar <3){
      $titulo = $line['titulo'];
      $data = $line['dt'];
    
    ?>

    <h1 class="titulos"><a href="#"><?php echo $titulo; ?></a></h1>
    <span class="data"><?php echo date('d/m/Y', strtotime($data)); ?></span>
    <?php
    $contar++;
    } 
    ?>
 </div>

</div>