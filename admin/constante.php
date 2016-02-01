<?php
	if ('localhost'==$_SERVER['SERVER_NAME']&&'localhost'==$_SERVER['SERVER_NAME']) {
		// ------------------------ Informacion base de datos local------------------------------//
		define("BD","dobe");
		define("SERVIDOR","localhost");
		define("USUARIO","postgres");
		define("CLAVE","rootdow");
		define("PUERTO",5432);
	}

	// ------------------------ Informacion conexion servidor dominio proceso correo------------------------------//
	define("IPSERVER","67.205.125.28");
	define("ACCOUNT","nextbook");
	define("PASSWD","EiCZTO.ePLFIP");
	define("PORTMAIL","2083");	
	define("DOMAIN","facturanext.com");

	//heroku
	// define("BD","d9enpdt3pbr34t");
	// define("SERVIDOR","ec2-50-16-229-89.compute-1.amazonaws.com");
	// define("USUARIO","ojzzjzjvmcmdsk");
	// define("CLAVE","h9kpWbGB1D7NuUQlz8PSbsUuOX");
	// define("PUERTO",5432);

	if ('www.nextbook.ec'==$_SERVER['SERVER_NAME']||'nextbook.ec'==$_SERVER['SERVER_NAME']) {
		// ------------------------ Informacion base de datos dominio ------------------------------//
		define("BD","nextbook_book");
		define("SERVIDOR","localhost");
		define("USUARIO","nextbook_root");
		define("CLAVE","WZ_aNTOCg-oX");
		define("PUERTO",5432);
	};
?>