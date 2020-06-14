<?php
if(isset($_POST['Login-admin'])){
 $usuario = $_POST['usuario'];
 $password = $_POST['passwor'];
 try {
   include_once 'funciones/funciones.php';
   $stmt = $conn->prepare("SELECT * FROM admins WHERE usuario = ?;");
   $stmt->bind_param("s", $usuario);
   $stmt->execute();
   $stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $password_admin, $editado, $nivel);
   if($stmt->affecteeed_rows){
     $existe = $stmt->fetch();
     if($existe){
       if(password_verify($password, $password_admin ))  {
         sesion_start();
         $_SESSION['usuario'] = $usuario_admin;
         $_SESSION['nombre'] = $nombre_admin;
         $_SESSION['nivel'] =$nivel;
         $_SESSION['id'] = $id_admin;
         $respuesta = array(
           'respuesta' => 'exitoso',
           'usuario' => $nombre_admin
         );
       }else{
         $respuesta = array(
           'respuesta' => 'password_incorrecto'
         );
       }

     }else{
       $respuesta = array(
         'respuesta' =>'no_existe'
       );
     }
   }
   $stmt->close();
   $conn->close();
 }catch(Exception $e){
   echo "error. " . $e->getMessage();
 }
 die(json_encode($respuesta));
}
