<?php
include_once("conexao.php");

$json = file_get_contents('php://input');
$obj = json_decode($json);

// Loop para percorrer o Objeto

$id_usuario = 1;
 $ganhoviagem = $obj->ganhoviagem;
 $tempo = $obj->tempo;
 $distancia = $obj->distancia;
 $valorCorrida = $obj->valorCorrida;
 $descontoCorrida = $obj->descontoCorrida;
 $horarioSolicitacao = $obj->horarioSolicitacao;
 $dataFechamento = $obj->dataFechamento;
$valorSomadoSemana = "0";
 $informacoesCadaCorrida = "Informacoes da corrida";
 $motorista = $obj->motorista;
 $idMotoristaSistema = $obj->idMotorista;
 //$distancia = $obj->mensagem;
$numSO = $obj->numSO;
$email = $obj->email;
$outros = $numSO;

$mysqli =  mysqli_connect("localhost","u385468929_jaman","HupaButeZy","u385468929_vuvet");

echo $numSO.$ganhoviagem." | ".$motorista." | ".$tempo." | ".$distancia." | ".$valorCorrida." | ".$descontoCorrida." | ".$horarioSolicitacao." | ".$dataFechamento." | ".$valorSomadoSemana." | ".$informacoesCadaCorrida;

//----------------------------CadastroUsuario-----------------------------------


//inicio tudo
$sqlUsuario = "SELECT * FROM teste";
$result3 = mysqli_query($mysqli, $sqlUsuario);

    $nomeMotorista;
    $idMotorista;
    $identificador2 = 0;
    while($row = mysqli_fetch_assoc($result3)) {

//aqui ele ler todos em um loop, ou seja a cada um que lê e é diferente ele salva
    	// então a forma para resolver isso é simples, colocar um identificador que, caso haja pelo menos 1 igual ele add valor, se não identificador fica zerado e ocorre o processo de cadastro.
    		if($motorista == $row['nome']){
    			$nomeMotorista = $row['nome'];
        		$idMotorista = $row['id'];
        		$identificador2 = 1;
    			
    		}else{
    		// -----------------------------------

    			echo "Nenhuma Instancia encontrada /:(";

    		}


    
    }

// inicio
	if ($identificador2 ==  0) { 
   			$result4 = "INSERT INTO teste(nome, email, 	user, senha, idSistemaFora) VALUES ('$motorista', '$email', 'admin', 'admin', $idMotoristaSistema)";
   					$INSERE = mysqli_query($mysqli, $result4);
   
        			if(mysqli_num_rows($INSERE)>0){
        			    
        			    $sqlUsuario = "SELECT * FROM teste";
                        $result3 = mysqli_query($mysqli, $sqlUsuario);
        			     while($row = mysqli_fetch_assoc($result3)) {


                    		if($motorista == $row['nome']){
                    			$nomeMotorista = $row['nome'];
                        		$idMotorista = $row['id'];
                        		$identificador2 = 1;
                    			$email = $row['email'];
                    		}else{
                    		// -----------------------------------
                
                    			echo "Nenhuma Instancia encontrada /:(";
                
                    		}


    
                         }
        			    
         			   echo "deucerto";   
      				  }else{
           			 echo "deu errado";
       			     }

    			}else{
    				echo $idMotorista.' Deu Certo '.$identificador2.$email;
    			}
// fim
    			//fim tudo


//-----------------------------------------------------------------------------


//----------------lançamento da corrida ---------------------------------------

date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d');
echo $date;
$duedt = explode("-", $date);
$date  = mktime(0, 0, 0, $duedt[1], $duedt[2], $duedt[0]);
$week  = (int)date('W', $date);
echo "Número da semana: " . $week;

  $result1 = "INSERT INTO viagem(id_usuario, ganhoViagem, tempo, distancia, valorCorrida, descontoCorrida, horarioSolicitacao, dataFechamento, informacoesCadaCorrida, motorista, outros, valorSomadoSemana, numSemana, idMotorista) VALUES ($idMotorista, '$ganhoviagem', '$tempo', '$distancia', '$valorCorrida', '$descontoCorrida', '$horarioSolicitacao', '$dataFechamento', '$outros', '$motorista', '$informacoesCadaCorrida ', '$valorSomadoSemana', '$week', '$idMotorista')";
 

if ( mysqli_query($mysqli, $result1)) {
              echo "deucerto";
    }else{
        echo 'deu grugui';
    }
//--------------------------------------------------------------------------

//-----------------------fechamento semanal ----------------------------------
    
    date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d');
$date2 = date('H:i');
echo $date;
$duedt = explode("-", $date);
$date  = mktime(0, 0, 0, $duedt[1], $duedt[2], $duedt[0]);
$week  = (int)date('W', $date);
echo "Número da semana: " . $week;

$variavel = str_replace('/','-',$date);
$hoje = getdate(strtotime($variavel));
  $data = date('D');  //$hoje["wday"];
echo $data;
$nova = date('d')."/".date('m')."/".date('Y');
if ($data == 'Sun' ) {
    // código gera cadastro de fechamento para cada usuario
 	
	//só mostra resulado se este codigo estiver excecultando no dia em questão 
	  $variavel = 0;
   $sqlSelecus="select*from semana";
   $sei =mysqli_query($mysqli,$sqlSelecus);
    while($r = mysqli_fetch_assoc($sei)){
        if($week == $r['numSemana'] && $idMotorista == $r['idMotorista']){
            echo 'já existe';
            $variavel = 1;
        }else{
          
        }
    }

    if($variavel != 1){
          $sqlSemana = "insert into semana(numSemana, dataFechamento, valorFechamento, idMotorista) values('$week', '$nova', '0','$idMotorista')";
        mysqli_query($mysqli,$sqlSemana);
        }else{
            echo "deu erro";
        }
}
if ($data == 'Mon' ) {
	echo "Segunda";

	/*
	*/
	
}
if ($data == 'Tue' ) {
	echo "Terça";
	/*
	 $variavel = 0;
   $sqlSelecus="select*from semana";
   $sei =mysqli_query($mysqli,$sqlSelecus);
    while($r = mysqli_fetch_assoc($sei)){
        if($week == $r['numSemana'] && $idMotorista == $r['idMotorista']){
            echo 'já existe';
            $variavel = 1;
        }else{
          
        }
    }

    if($variavel != 1){
          $sqlSemana = "insert into semana(numSemana, dataFechamento, valorFechamento, idMotorista) values('$week', '$nova', '0','$idMotorista')";
        mysqli_query($mysqli,$sqlSemana);
        }else{
            echo "deu erro";
        }
	
*/
}
if ($data == 'Wed' ) {
	echo "Quarta";
}
if ($data == 'Thu' ) {
	echo "Quinta";
}
if ($data == 'Fri' ) {
	echo "Sexta";
}
if ($data == 'Sat' ) {
	echo "Sabado";
}


//----------------------------------------------------------------------------
mysqli_close($mysqli);




 
 



?>