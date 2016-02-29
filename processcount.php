
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="img/logo.png">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="container">
    	<div class="content">
    		<div class="jumbotron center">
		      <div class="container center">
		        <?php 
						if(!isset($_SESSION)){
					        session_start();        
					    }
						include_once('admin/class.php');
						//----------------------variable global declara uso clase en general db------------------//
						$class=new constante();
						// verificacion existencia registro empresa cod ruc
						if (isset($_GET['activ_reg_count'])) {			
							$acu[0]=0;
							$resultado = $class->consulta("UPDATE empresa.getsri set stado='1' WHERE id = '".$_GET['id']."'");
							if ($resultado) {
								print '<h1 class="center">Felicitaciones su cuenta se ha activado con éxito</h1>';
								print '<p>Su petición se ha realizado correctamente, ahora puede iniciar sesión</p>';
								print '<p><a class="btn btn-primary btn-lg" href="data/login/" role="button">Entrar</a></p>';
							}else{
								print '<h1>Lo sentimos!</h1>';
								print '<p>Su peticion no se ha procesado intente mas tarde</p>';
							}		
							
						}
					?>
		      </div>
		    </div>
    	</div>
    </div>

    <div class="container">
      <hr>

      <footer>
        <p>&copy; 2016 promodaatuntaqui.com, desarrollado por David Criollo</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>window.jQuery || document.write('<script src="js/jquery-2.1.1.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>

