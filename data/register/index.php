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


    
	<!--

	REQUIRED
	You must include this in your project.

	RECOMMENDED
	This category must be included but you may modify which plugins or components which should be included in your project.

	OPTIONAL
	Optional plugins. You may choose whether to include it in your project or not.

	DEMONSTRATION
	This is to be removed, used for demonstration purposes only. This category must not be included in your project.

	SAMPLE
	Some script samples which explain how to initialize plugins or components. This category should not be included in your project.


	Detailed information and more samples can be found in the document.

	-->
		

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
		
		<!-- REGISTRATION FORM -->
		<!--===================================================-->
		<div class="cls-content">
			<div class="cls-content-lg panel">
				<div class="panel-body">
					<p class="pad-btm">Crear Cuenta</p>
					<form id="form-data" name="form-data">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-male"></i></div>
										<input type="text" class="form-control" placeholder="Nombre Completo" name="txt_1" value="Deivid Criollo">
										<input name="form-data" type="hidden">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
										<input type="text" class="form-control" placeholder="E-mail" name="txt_correo" value="deividscriollo@gmail.com">
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-user"></i></div>
										<input type="text" class="form-control" placeholder="Ruc Empresa" name="txt_ruc" value="1002132759001">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
										<input type="password" class="form-control" placeholder="Password" name="txt_4" value="roeee">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-8 text-left checkbox">
								<div class="form-group">
									<div class="col-lg-9">
										<div class="checkbox">
											<label class="form-checkbox form-icon">
												<input type="checkbox" name="txt_5" value="accept" checked />
													Tienes que aceptar los 
													<a href="../terminos/" class="blue">
														términos y políticas
													</a>
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-4">
								<div class="form-group text-right">
									<button class="btn btn-success text-uppercase" type="submit" name="obj-data">Guardar</button>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<a href="../login/">
									<button class="btn btn-primary btn-lg btn-block" type="button">
										<i class="fa fa-unlock-alt"></i> Ya tienes una cuenta ? Ingresar
									</button>
								</a>
							</div>
							<div class="col-sm-6">
								<a href="../restore/">
									<button class="btn btn-primary btn-lg btn-block" type="button" >
										<i class="fa  fa-key"></i> Se te olvidó tu contraseña ?
									</button> 
								</a>
							</div>
						</div>
					</form>
				</div>
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
