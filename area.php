<?php
session_start();
if($_SESSION['login']==true){
include_once('conexao.php');


?>


<!DOCTYPE html>
<html>
<head>
    <title></title>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


<style type="text/css">
    .param {
    margin-bottom: 7px;
    line-height: 1.4;
}
.param-inline dt {
    display: inline-block;
}
.param dt {
    margin: 0;
    margin-right: 7px;
    font-weight: 600;
}
.param-inline dd {
    vertical-align: baseline;
    display: inline-block;
}

.param dd {
    margin: 0;
    vertical-align: baseline;
} 

.shopping-cart-wrap .price {
    color: #007bff;
    font-size: 18px;
    font-weight: bold;
    margin-right: 5px;
    display: block;
}
var {
    font-style: normal;
}

.media img {
    margin-right: 1rem;
}
.img-sm {
    width: 90px;
    max-height: 75px;
    object-fit: cover;
}
spam{
    border: 1px solid blue;
    padding:10px;
    margin:0 auto;
    display:block;
}
separa{
    background: #000;
    height:20px;
    padding:30px;
}

</style>



</head>
<body>



<div class="container">
<br>  <p class="text-center">Bem Vindo <?php echo  $_SESSION['NOME']; ?></p>
<hr>



<div class="card">
<table class="table table-hover shopping-cart-wrap">
<thead class="text-muted">
<tr>
  <th scope="col">FECHAMENTOS DA SEMANA - PARA VER OUTROS FECHAMENTOS SEMANAIS <a href="outros.php">CLIQUE AQUI</a></th>
  <th scope="col" width="120">VALOR</th>
</tr>
</thead>
<tbody>
  
        <?php
   
   
date_default_timezone_set('America/Sao_Paulo');
$date = date('y-m-d');
$date2 = date('H:i:s');
echo '<div style="font-weight:bold;">Data: '.$date.'</div>';
$duedt = explode("-", $date);
$date  = mktime(0, 0, 0, $duedt[1], $duedt[2], $duedt[0]);
$week  = (int)date('W', $date);
//echo "Número da semana: " . $week;
$variavel = str_replace('/','-',$date);
$hoje = getdate(strtotime($variavel));
$data = $hoje["wday"];
$ses = $_SESSION['usuario'];
$valorCorrida2 = 0;  
//$ses = $_SESSION['usuario'];
//echo $ses;
$nova = "";
$contagem = $week; 
$valor;  
   
    $sql = "select semana.id, semana.numSemana, semana.dataFechamento, semana.valorFechamento, semana.idMotorista, viagem.valorCorrida, viagem.idMotorista, viagem.numSemana From semana inner join viagem on semana.numSemana = viagem.numSemana and semana.idMotorista = viagem.idMotorista";

 $selecao2 = mysqli_query($mysqli, $sql);

 while($row = mysqli_fetch_assoc($selecao2)) {

$nova = $row['dataFechamento'];
//$ses =150;
 if ($row['idMotorista'] == $ses && $row['viagem.numSemana'] == $row['semana.numSemana']) {
    //echo $row['numSemana'];  
    $valor = $valor+$row['valorCorrida'];
   // echo '<br>'.$row['idMotorista'].'<br>'.$valor;
    
    while ($contagem >= 0) {
         if ($contagem == $row['numSemana']) {
             $atualizaSemana = "UPDATE `semana` SET `numSemana`='$contagem',`dataFechamento`='$nova',`valorFechamento`='$valor',`idMotorista`='$ses' WHERE `idMotorista`= '$ses' AND `numSemana` = '$contagem'"; 
             
             $insereValor = mysqli_query($mysqli, $atualizaSemana);
             
         }
       
       $contagem =  $contagem-1;
    }
    
    
    
    }
    
    
    

 }
    




       $selecionaSemana = "select*from semana where idMotorista=".$ses;
                        $selcsem = mysqli_query($mysqli, $selecionaSemana);
                      if(count($selcsem) == 0 || !empty($selcsem)){
                        // echo '<span style = "position:relative; float: right;">não existem registros</span>';
                       }
                        while($linhaNova = mysqli_fetch_assoc($selcsem)){
                            if($linhaNova['idMotorista'] == $ses){
                        echo '<TR><td> <h6 class="title text-truncate" style="float:left;"> FECHAMENTO SEMANA: '.$linhaNova['numSemana']."</h6><br/>";
                        //seleciona viagem se id do usuario na viagem for igual a sessao do usuario
                        $selecaoViagens = "select*from viagem where id_usuario='$ses'";
                        
                        $queryViagem = mysqli_query($mysqli, $selecaoViagens);
                        
                        while ($linhaViagem = mysqli_fetch_assoc($queryViagem)) {
                            if($week == $linhaViagem['numSemana']){
                        
                            echo '<div>'."<spam>Numero Corrida:".$linhaViagem['informacoesCadaCorrida']."</spam><spam> - TEMPO/min: ".$linhaViagem['tempo']."</spam><spam>Distancia: 
                            ".$linhaViagem['distancia']."</spam><spam>Valor Corrida:".$linhaViagem['valorCorrida']."</spam><spam> 
                            Desconto:".$linhaViagem['descontoCorrida']. "</spam><spam>Horario".$linhaViagem['horarioSolicitacao']."</spam><spam>Data:
                            ".$linhaViagem['dataFechamento']."</spam><spam>Semana: ".$linhaViagem['numSemana'].'<br><span class = "separa">_</span></div>';
                            }
                           
                        }
                            
                            echo "</td>";
                            echo "<td>";
                            echo "<h1> valor:".$linhaNova['valorFechamento']."</h1> ".$linhaNova['dataFechamento'];
                            
                           
                            echo "</td>";
                           
                          echo " </TR>";
                          
                               


                            }
                        }   

        ?>
  

</tbody>
</table>
</div> <!-- card.// -->

</div> 
<!--container end.//-->

<br><br>
<article class="bg-secondary mb-3">  
<div class="card-body text-center">
    <h3 class="text-white mt-3">TAXi 1.0</h3>
<p class="h5 text-white">DESENVOLVIDA POR: <br>
<p><a class="btn btn-warning" target="_blank" href="http://tecinova.tech/"> tecinova.tech  
 <i class="fa fa-window-restore "></i></a></p>
</div>
<br><br>
</article>
</body>
</html>



<?php 




}else{



 header('location:index.php');


	} ?>