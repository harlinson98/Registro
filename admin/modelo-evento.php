<?php

//ping a la base de datosif($conn->ping()){
//  echo "Conectado";
//}else{
//  echo "No!";
//}
include_once 'funciones/funciones.php';

$titulo = $_POST['titulo_evento'];
$categoria_id = $_POST['categoria_evento'];
$invitado_id = $_POST ['invitado'];
//obtener fecha
$fecha = $_POST['fecha_evento'];
$fecha_formateada = date('y-m-d', strtotime($fecha));
//hora
$hora = $_POST['hora_evento'];
$hora_formateada = date('H:i' strtotime($hora));
$id_registro = $_POST['id_registro'];
if($_POST['registro'] =='nuevo'){ //die(json_encode($_POST));
  try{
    $stmt = $conn->prepare('INSERT INTO eventos (nombre_evento, fecha_evento, hora_evento, id_cat_evento, id_inv) VALUES (?,?,?,?,?) ');
   $stmt->bind_param('ssssii', $titulo, $fecha_formateada, $hora, $categoria_id, $invitado_id);
   $stmt->execute();
   if($stmt->affected_rows){
     $respuesta = array();
   }else{
     $respuesta = array(
       'respuesta' =>'error'
     );
   }
    $stmt->close();
    $conn->close();
  }catch (Exception $e){
    $respuesta = array(
      'respuesta' => $e->getMessage()
    );
  }
  die(json_encode($respuesta));

  }

 if($_POST['registro'] == 'actualizar'){



   try {
       $stmt = $conn->prepare('UPDATE  eventos SET nombre_evento = ?, fecha_evento= ?, hora_evento= ?, id_cat_evento= ?, id_inv = ?, editado = NOW() WHERE  evento_id = ?');
      $stmt->bind_param('sssiii', $titulo, $fecha_formateada, $hora_formateada, $categoria_id, $invitado_id, $id_registro);
      $stmt->execute();
      if($stmt->affected_rows){
        $respuesta = array(
          'respuesta' => 'exito',
          'id_actualizado' => $id_registro
        );
      }else{
        $respuesta = array(
          'respuesta' => 'error'
        );
      }

      $stmt->close();
      $conn->close();
   } catch (Exception $e) {
      $respuesta = array(
        'respuesta' => $e->getMessage()
      );
   }
    die(json_encode($respuesta));

 }

 if($_POST['registro'] == 'eliminarr'){
    
    $id_borrar =$_POST('id');
    try{
      $Stmt = $conn->prepare('DELETE FROM admis WHERE id_admin = ? ');
      $stmt->bind_param('i', $id_borrar);
      $stmt->execute();
      if ($stmt->affected_rows) {
        $respuesttttta = array(
          'respuesta'=> 'exito',
          'id_eliminado'=> $id_borrar
        );
      }
    }else{
      $respuesta = array(
        'respuesta' => 'error'
      );
    }catch (Execute $e){
      $respuesta = array(
        'respuesta' => $e->getMessage()
      );
    }
    die(json_encode($respuesta));
  }




 }
