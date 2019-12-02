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
input{
    font-size:18px;
}

.separa{
    background: #000;
    height:20px;
    padding:0px;
    width: 100%;
}
.centraliza{
    margin:30px auto;
  
}
.voltar{
    padding:10px;
    font-size:16px;
    background:#000;
    color:#fff;
}
.voltar:hover{
    padding:10px;
    font-size:16px;
    background:#fff;
    color:#000;
}

</style>



</head>
<body>
    
    <div class="card" style="margin: 0px auto;  width: 20rem;">
  <div class="card-body">
    
    
    
    
    <hr>
    <div class="centraliza">
  
  
<form method="POST" action="outros.php">
    Pesquisar:<input type="text" name="pesquisar" placeholder="informe o numero da semana assim: 01" >
    <input type="submit" value="ENVIAR">
    

</form>
<?php 
$pesq = $_POST['pesquisar'];
//echo $pesq;

   
   
date_default_timezone_set('America/Sao_Paulo');
$date = date('y-m-d');
$date2 = date('H:i:s');
echo $date;
$duedt = explode("-", $date);
$date  = mktime(0, 0, 0, $duedt[1], $duedt[2], $duedt[0]);
$week  = $pesq;

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
                         echo "<div>Não foram localizadas VIAGENS no momento.</div>";
                       }
                        while($linhaNova = mysqli_fetch_assoc($selcsem)){
                            if($linhaNova['idMotorista'] == $ses){
                       
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
<hr>
      <a href = "area.php" style="position:relative; float:right; margin:10px auto; text-decoration:none;" class="voltar"><- Voltar</a>
</div>

  </div>
</div>
    
</body>
</html>
<?php } ?>