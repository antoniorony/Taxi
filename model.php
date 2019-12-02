<?php
include_once("conexao.php");

$opcao = $_POST["cad"];


if ($opcao == "Registrar") {
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$usuario = $_POST["user"];
	$senha = $_POST["senha"];
	$confirm = $_POST["confirm"];

	if ($senha == $confirm) {
		$sql = "insert into teste(nome, email, user, senha) values('$nome','$email','$usuario','$senha')";
 		 $resultado_usuario = mysqli_query($mysqli, $sql);
		if (mysqli_affected_rows($mysqli) != 0) {
			echo '<script type="text/javascript">
			alert ("Cadastrado com sucesso!");
			window.location.href = "index.php";
		</script>';
		}

	}else{
		echo '<script type="text/javascript">
			alert ("Taxista \n Senha diferente da confirmação \n coloque a senha novamente.");
			window.location.href = "registrar.php";
		</script>';
		//header('location:registrar.php');
	}


}


if ($opcao=="Acessar") {
	
}


?>