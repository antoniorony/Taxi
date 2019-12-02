<?php
session_start();
include_once('conexao.php');
$usu = $_POST['usuario'];
$se = $_POST['senha'];

echo $usu;
echo $se;



$sql = "SELECT * FROM teste WHERE senha = '".$se."' and email = '".$usu."'";
$result = mysqli_query($mysqli, $sql);

if(mysqli_num_rows($result)>0){
 while($row = mysqli_fetch_assoc($result)) {
       $_SESSION['login'] = $usu;
        $_SESSION['NOME'] = $row['nome'];
	$_SESSION['usuario'] = $row['id'];          
     }
	
	
 	header('location:area.php');

}else{
	header('location:index.php');
}


/*while($row = mysqli_fetch_assoc($query)) {

if ($usu == $row['user']) {
	if ($se == $row['senha']) {
		
	
	
}
}

}*/







?>