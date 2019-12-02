<?php

    $servidor = "localhost";
    $usuario = "root";
    $senha = "admin";
    $dbname = "taxi";
    
    //Criar a conexao
    //$mysqli = new mysqli($servidor, $usuario, $senha, $dbname);
    $mysqli =  mysqli_connect("localhost","u385468929_jaman","HupaButeZy","u385468929_vuvet");
    
    if($mysqli->connect_errno){
        echo "err";
    } 
    
   
/*
   
   
date_default_timezone_set('America/Sao_Paulo');
$date = date('y-m-d');
$date2 = date('H:i:s');
echo $date;
$duedt = explode("-", $date);
$date  = mktime(0, 0, 0, $duedt[1], $duedt[2], $duedt[0]);
$week  = (int)date('W', $date);
echo "Número da semana: " . $week;
$variavel = str_replace('/','-',$date);
$hoje = getdate(strtotime($variavel));
$data = $hoje["wday"];
$ses = $_SESSION['usuario'];
$valorCorrida2 = 0;  
$ses = $_SESSION['usuario'];
$nova = "";
$contagem = $week; 
$valor;  
   
    $sql = "select semana.id, semana.numSemana, semana.dataFechamento, semana.valorFechamento, semana.idMotorista, viagem.valorCorrida, viagem.idMotorista, viagem.numSemana From semana inner join viagem on semana.numSemana = viagem.numSemana and semana.idMotorista = viagem.idMotorista";

 $selecao2 = mysqli_query($mysqli, $sql);

 while($row = mysqli_fetch_assoc($selecao2)) {

$nova = $row['dataFechamento'];
$ses = $row['idMotorista'];
 if ($row['idMotorista'] == '150' && $row['viagem.numSemana'] == $row['semana.numSemana']) {
    echo $row['numSemana'];  
    $valor = $valor+$row['valorCorrida'];
    echo '<br>'.$row['idMotorista'].'<br>'.$valor;
    
    while ($contagem >= 0) {
         if ($contagem == $row['numSemana']) {
             $atualizaSemana = "UPDATE `semana` SET `numSemana`='$contagem',`dataFechamento`='$nova',`valorFechamento`='$valor',`idMotorista`='$ses' WHERE `idMotorista`= '$ses' AND `numSemana` = '$contagem'"; 
             
             $insereValor = mysqli_query($mysqli, $atualizaSemana);
             
         }
       
       $contagem =  $contagem-1;
    }
    
    
    
    }
    
    
    

 }
*/