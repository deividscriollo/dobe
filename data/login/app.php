<?php 
	if(!isset($_SESSION)){
        session_start();        
    }
	include_once('../../admin/class.php');
	class RespuestaSRI {
		public $mensaje;
		public $existe = false;
		public $razonSocial;
		public $nombreComercial;
		public $ruc;
		function __construct($ruc){
			$this->ruc = $ruc;
		}
		function encontrado($razon, $nombre){
			$this->razonSocial = $razon;
			$this->nombreComercial = $nombre;
			$this->existe = true;
			return $this;
		}
		
		function noEncontrado($mensaje){
			$this->mensaje = $mensaje;
			$this->existe = false;
			return $this;
		}
	}
	/**
	 * Servicio web remoto que consulta al SRI por datos sobre un ruc utilizando
	 * "screen scrapping", simulando ser un navegador. Depende de CURL
	 */
	class ServicioSRI {
		var $user_agent = array();
		var $url;
		var $url_1;
		var $proxy;
		function __construct(){
			$this->url = "https://declaraciones.sri.gob.ec/facturacion-internet/consultas/publico/ruc-datos2.jspa";			
			$this->url_1 = "https://declaraciones.sri.gob.ec/facturacion-internet/consultas/publico/ruc-establec.jspa";			
			$user_agent[] = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322; FDM)";
			$user_agent[] = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; Avant Browser [avantbrowser.com]; Hotbar 4.4.5.0)";
			$user_agent[] = "Mozilla/5.0 (Macintosh; U; Intel Mac OS X; en; rv:1.8.1.14) Gecko/20080409 Camino/1.6 (like Firefox/2.0.0.14)";
			$user_agent[] = "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Version/3.1 Safari/525.13";
			$user_agent[] = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; NeosBrowser; .NET CLR 1.1.4322; .NET CLR 2.0.50727)";
			$user_agent[] = "Mozilla/5.0 (Windows; U; Windows NT 5.1; es-ES; rv:1.8.1) Gecko/20061010 Firefox/2.0";
			$this->user_agent = $user_agent;
		}
		function rawRUC($ruc){
			$rnd = rand(0, count($this->user_agent)-1);
			$agent = $this->user_agent[$rnd];
			//define('POSTVARS', 'pagina=resultado&opcion=1&texto='. $ruc );
			$post = 'accion=siguiente&ruc='. $ruc;
			//$ch = curl_init("https://declaraciones.sri.gov.ec/facturacion-internet/consultas/publico/ruc-datos2.jspa");
			$ch = curl_init($this->url);			
			//print_r($ch);
			curl_setopt($ch, CURLOPT_POST      ,1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				
			//curl_setopt($ch, CURLOPT_POSTFIELDS    , POSTVARS);
			curl_setopt($ch, CURLOPT_POSTFIELDS    , $post);
			curl_setopt($ch, CURLOPT_USERAGENT, $agent);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
			curl_setopt($ch, CURLOPT_HEADER      ,0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);			

			/// PROXY
			//Si tiene salida a Internet por Proxy, debe poner ip y puerto
			if($this->proxy) {
				curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
				curl_setopt($ch, CURLOPT_PROXY, $this->proxy['url']);  // '172.20.18.6:8080'
				if(isset($this->proxy['user']) && isset($this->proxy['password'])){
					$cred = $this->proxy['user'].':'.$this->proxy['password'];
					curl_setopt($ch, CURLOPT_PROXYUSERPWD, $cred);
				}
				//curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'user:password');
			}
			$res = curl_exec($ch);
			curl_close($ch);
			return $res;
		}				
		public function datosRUC($ruc) {
			$html = $this->rawRUC($ruc);				
			$res = new RespuestaSRI($ruc);					
			if(stripos($html, 'El RUC no se encuentra registrado en nuestra base de datos') !== false)
				return $res->noEncontrado('No se encuentra');
			//return array('RazonSocial' => 'NO SE ENCUENTRA', 'NombreComercial' => 'NO SE ENCUENTRA');
			if(stripos($html, 'Error en el Sistema') !== false)
				return $res->noEncontrado('Error en el sistema remoto');
			//return array('RazonSocial' => 'Error en el Sistema Remoto', 'NombreComercial' => '');
			$startString  = '<table class="formulario">';
			$endString    = '</table>';	
			$startColumn = stripos($html, $startString) + strlen($startString);
			$endColumn   = stripos($html, $endString, $startColumn);
			$razon = substr($html, $startColumn, $endColumn-$startColumn);			
			$razon = str_replace('<tr><td colspan="2">&nbsp;</td></tr>', "", $razon);
			$razon = str_replace('<tr><td colspan="2" class="lineaSep" /></tr>', "", $razon);
			$razon = str_replace(',', "", $razon);
			$razon = str_replace('<th>', "<td>", $razon);
			$razon = str_replace('</th>', "</td>", $razon);

			$razon = '<table>'.$razon.'</table>';	
		
			return $razon;		
		}
	}	
	function getdata($table){//obtnemos la informacion de la tabla obtenida
		$resp='';
	    $contents = $table;
	    $DOM = new DOMDocument;
	    $DOM->loadHTML($contents);

	    $items = $DOM->getElementsByTagName('tr');	    

	    foreach ($items as $node) {	    	
	    	$v = utf8_decode(str_replace(',', "", tdrows($node->childNodes)));	    	
	        $resp[] = $v;
	    }	    
	    return $resp;
	}


	//----------------------variable global declara uso clase en general db------------------//
	$class=new constante();
	// verificacion existencia registro empresa cod ruc
	if (isset($_POST['registro_existencia_empresa'])) {	
		$resultado = $class->consulta("SELECT RUC FROM empresa.getsri  WHERE RUC = '".$_POST['txt_ruc']."'");
		$acu['valid']='false';
		if($class->num_rows($resultado) == 0 ){			
			$acu['valid']='true'; // el ruc no existe
		}else{
			$acu['valid']='false'; // el ruc no existe
		}
		print_r(json_encode($acu));
		
	}
	if (isset($_POST['verific_user_mail'])) {	
		// $resultado = $class->consulta("SELECT RUC FROM seg.empresa  WHERE correo = '".$_POST['txt_correo']."'");
		// if($class->num_rows($resultado) == 0 ){			
		// 	print 'false'; // el ruc no existe
		// }else{
		// 	print 'true'; //el ruc ya existe
		// }
		echo json_encode(array('valid' => 'true'));
	}
?>