<?php 
	if(!isset($_SESSION)){
        session_start();        
    }
	include_once('../../admin/class.php');
	//----------------------variable global declara uso clase en general db------------------//
	$class=new constante();
	// verificacion existencia registro empresa cod ruc
	if (isset($_POST['txt_usuario'])) {	
		$acu;
		$resultado = $class->consulta("	SELECT * FROM seg.acceso  
										WHERE login = '".$_POST['txt_usuario']."' AND pass=md5('".$_POST['txt_pass']."')");
		if($class->num_rows($resultado) > 0 ){
			while ($row=$class->fetch_array($resultado)) {				
				$_SESSION['modelo'] = $row[1];
			}		
			echo json_encode(array('valid' => 'true')); // el ruc no existe
		}else{
			echo json_encode(array('valid' => 'false')); //el ruc ya existe
		}
	}
?>