<?php 
	// procesos session
	session_start();
	if (isset($_SESSION['modelo'])) {
	  // $_SESSION['modelo'] = 0;
		header('Location: ../');
	  //con session
	}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Promoda</title>
    <link rel="icon" type="image/png" href="../../img/logo.png">


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ] -->
     <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet">


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="../../css/nifty.min.css" rel="stylesheet">

    <!--Sweetalert [ REQUIRED ]-->
    <link rel="stylesheet" href="../../plugins/sweetalert/css/sweetalert.css"/>

    
    <!--Font Awesome [ OPTIONAL ]-->
    <link href="../../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">


    <!--Bootstrap Validator [ OPTIONAL ]-->
    <link href="../../plugins/bootstrap-validator/bootstrapValidator.min.css" rel="stylesheet">


    <!--Demo [ DEMONSTRATION ]-->
    <link href="../../css/demo/nifty-demo.min.css" rel="stylesheet">
    <link href="../../css/color.css" rel="stylesheet">

    <!--SCRIPT-->
    <!--=================================================-->

    <!--Page Load Progress Bar [ OPTIONAL ]-->
    <link href="../../plugins/pace/pace.min.css" rel="stylesheet">
    <script src="../../plugins/pace/pace.min.js"></script>
		

</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
	<div id="container" class="cls-container">
		
		
		<!-- BACKGROUND IMAGE -->
		<!--===================================================-->
		<div id="bg-overlay" class="bg-img img-balloon"></div>
		
		<!-- HEADER -->
		<!--===================================================-->
		<div class="cls-header cls-header-lg">
			<div class="cls-brand">
				<a class="box-inline" href="index.html">
					<!-- <img alt="Nifty Admin" src="../../img/logo.png" class="brand-icon"> -->
					<span class="brand-title">Promoda <span class="text-thin">Admin</span></span>
				</a>
			</div>
		</div>
		
		<!-- LOGIN FORM -->
		<!--===================================================-->
		<div class="cls-content">
			<div class="cls-content-sm panel">
				<div class="panel-body">
					<p class="pad-btm">Iniciar sesión en su cuenta</p>
					<form id="form-data">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-user"></i></div>
								<input type="text" id="txt_usuario" name="txt_usuario" class="form-control" placeholder="Correo Electrónico">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
								<input type="password" id="txt_pass" name="txt_pass" class="form-control" placeholder="Password">
							</div>
						</div>
						<div class="row pull-right">
							<div class="col-xs-4">
								<div class="form-group text-right">
								<button class="btn btn-success text-uppercase" type="submit">Entrar</button>
								</div>
							</div>
						</div>
						
					</form>
				</div>
			</div>
			<div class="pad-ver">
				<a href="../restore/" class="btn-link mar-rgt">Se te olvidó tu contraseña ?</a>
				<a href="../register/" class="btn-link mar-lft">Crear cuenta <i class="fa fa-database"></i></a>
			</div>
		</div>
		<!--===================================================-->	
		
		
	</div>
	<!--===================================================-->
	<!-- END OF CONTAINER -->


		
	<!--JAVASCRIPT-->
	<!--=================================================-->

	<!--jQuery [ REQUIRED ]-->
	<script src="../../js/jquery-2.1.1.min.js"></script>

	<!--BootstrapJS [ RECOMMENDED ]-->
	<script src="../../js/bootstrap.min.js"></script>

	<!--Fast Click [ OPTIONAL ]-->
	<script src="../../plugins/fast-click/fastclick.min.js"></script>
	
	<!--Nifty Admin [ RECOMMENDED ]-->
	<script src="../../js/nifty.min.js"></script>

	<!--Masked Input [ OPTIONAL ]-->
	<script src="../../plugins/masked-input/jquery.maskedinput.min.js"></script>

	<!--Alert sweetalert  [ OPTIONAL ]-->
	<script src="../../plugins/sweetalert/js/sweetalert.min.js"></script>

	<!--Block Ui [ OPTIONAL ]-->
	<script src="../../plugins/blockui/blockui.js"></script>

	<!--Bootstrap Validator [ OPTIONAL ]-->
	<script src="../../plugins/bootstrap-validator/bootstrapValidator.min.js"></script>

	<!--Background Image [ DEMONSTRATION ]-->
	<script src="../../js/demo/bg-images.js"></script>

	<!-- script config -->
	<script src="app.js" type="text/javascript"></script>
		

</body>
</html>
