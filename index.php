<html>

<head>
<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>FORMULARIO WORDPRESS PLUGIN</title>
   
		<!----
		<link href="css/bootstrap-datepicker.css" rel="stylesheet"/>
		<script src="js/bootstrap-datepicker.min.js"></script> 
		<script src="js/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>

		
		<script src="js/bootstrap.js"></script> 
		<script src="js/bootstrap.min.js"></script> 
		<link href="css/bootstrap.css" rel="stylesheet"/>
		<link href="css/bootstrap.min.css" rel="stylesheet"/>
-->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>

body {
  margin: 0;
  padding: 0;
  background-color: #0d4260;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 320px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}

@media screen and (min-width:767px){

}
@media screen and ( max-width: 766px){

}
 @media screen and (max-width:380px){

}
@media screen and (max-width:277px){
.some{display: none;}
}

</style>

</head>

<body>
	    <div id="login">
        <h3 class="text-center text-white pt-5">TAXI - LOGIN</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="logar.php" method="post">
                            <h3 class="text-center text-info">ACESSO</h3>
                          
                            <div class="form-group">
                                <label for="username" class="text-info" >E-mail:</label><br>
                                <input type="text" name="usuario" id="username" class="form-control" placeholder = "seu.e-mail@host.com.br">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Senha:</label><br>
                                <input type="password" name="senha" id="password" class="form-control" placeholder = "********">
                            </div>
                            <div class="form-group">
                               
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Acessar">


                            </div>
                            <br/>
                            <div id="register-link" class="text-right some" style="margin-top: -15%;">
                                <a href="registrar.php" class="text-info">Registrar-se </a> |
                                <label for="remember-me" class="text-info"><span>Lembrar</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>