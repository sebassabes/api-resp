<?php
/*permisos de acceso a la base datos*/
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
/*permisos terminados*/
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

// POST ingresar formulario
$app->post('/api/ingresar/formulario/', function(Request $request, Response $response){

$correo=$request->getParam('correo');
$p1=$request->getParam('p1');
$p2=$request->getParam('p2');
$p3=$request->getParam('p3');
$fecha=$request->getParam('fecha');
  
  $sql1="Select * from test where correo='$correo' and month(now())=month('$fecha');";
  
 $sql = "INSERT INTO `test`( `correo`, `p1`, `p2`, `p3`, `fecha`) VALUES (:correo,:p1,:p2,:p3,now())" ;
  $mensaje="";
  
  try{
    $db = new db();
    $db = $db->conectDB();
	$resultado =  $db->query($sql1);
	
	if($resultado->rowCount()>0) $mensaje="Su formulario ha sido ingresado en este mes.";
	else{
    $resultado = $db->prepare($sql);
    $resultado->bindParam(':correo',$correo);
    $resultado->bindParam(':p1', utf8_decode($p1));
    $resultado->bindParam(':p2', $p2);
    $resultado->bindParam(':p3', $p3);

    
    
	$resultado->execute();
	$mensaje="datos ingresados";
    }
	echo $mensaje;  

    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 

// login usuario
$app->post('/api/usuario/login/',function(Request $request, Response $response){
	    $password=$request->getParam('password');
    $correo=$request->getParam('correo');
  $sql = "select * from usuario where correo='$correo' and password=md5('$password');";
 try{
     $db = new mysqli("localhost", "root", "explora2017", "test-autofact");
	 $id_hilo = $db->thread_id;
    // esto es necesario a la hora de recuperar datos en utf 8
    mysqli_set_charset($db, "utf8");
	$resultado = mysqli_query($db,$sql);
  $respuesta = array();
	   if ( !empty($resultado) AND mysqli_num_rows($resultado) > 0){
     while($fila = $resultado->fetch_assoc()) {
      $respuesta[] = $fila;
  }
      echo json_encode($respuesta, JSON_UNESCAPED_UNICODE );
	   } else echo json_encode('no exiten resultados');

  
    $resultado = null;
    $db->kill($id_hilo);
	$db->close();
	
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }


}); 

$app->post('/api/formulario/consulta/',function(Request $request, Response $response){
	
	 $fecha=$request->getParam('correo');
     $sql = "select * from test;";
     
	 try{
     $db = new mysqli("localhost", "root", "explora2017", "test-autofact");
	 $id_hilo = $db->thread_id;
    // esto es necesario a la hora de recuperar datos en utf 8
    mysqli_set_charset($db, "utf8");
	$resultado = mysqli_query($db,$sql);
  $respuesta = array();
	   if ( !empty($resultado) AND mysqli_num_rows($resultado) > 0){
     while($fila = $resultado->fetch_assoc()) {
      $respuesta[] = $fila;
  }
      echo json_encode($respuesta, JSON_UNESCAPED_UNICODE );
	   } else echo json_encode('no exiten resultados');

  
    $resultado = null;
    $db->kill($id_hilo);
	$db->close();
	
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }

 

}); 

$app->post('/api/consulta/usuario/',function(Request $request, Response $response){
	
	 $fecha=$request->getParam('correo');
     $sql = "select * from test where month(fecha)=month('$fecha')";
     
	 try{
     $db = new mysqli("localhost", "root", "explora2017", "test-autofact");
	 $id_hilo = $db->thread_id;
    // esto es necesario a la hora de recuperar datos en utf 8
    mysqli_set_charset($db, "utf8");
	$resultado = mysqli_query($db,$sql);
  $respuesta = array();
	   if ( !empty($resultado) AND mysqli_num_rows($resultado) > 0){
     while($fila = $resultado->fetch_assoc()) {
      $respuesta[] = $fila;
  }
      echo json_encode($respuesta, JSON_UNESCAPED_UNICODE );
	   } else echo json_encode('no exiten resultados');

  
    $resultado = null;
    $db->kill($id_hilo);
	$db->close();
	
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }

 

}); 
