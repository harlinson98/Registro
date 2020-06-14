<?php

include_once 'funciones/funciones.php';

$nombre = $_POST['nombre_invitado'];
$apellido =  $_POST ['apellido_invitado'];
$biografia = $_POST['biografia_invitado'];
$id_registro = $_POST['biografia_invitado'];
if($_POST['registro'] == 'nuevo'){
   /*$respuesta = array(
     'post' => $_POST,
     'file' => $_FILES
   );
   die(json_encode($respuesta));*/

   $directori = "../img/invitados/";
   if(!is_dir($directorio)){
     mkdir($directori, 0755, true);
   }
   if(move_uploaded_file($_FILE['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])){
     $imagen_url = $_FILES['archivo_imagen']['name'];
     $imagen_resultado = "se subió correctamente";
   }else{
     $respuesta = array(
       'respuesta' => error_get_last()
     );
   }

  try{
    $stmt = $conn->prepare('INSERT INTO invitados (nombre_invitado, apellido_invitado, descripcion, url_imagen) VALUES (?, ?, ?, ?)';
    $stmt->bind_param("ssss", $nombre, $apellido, $biografia, $imgen_url);
    $stmt->execute();
    $id_insertado = $stmt->insert_id;
   if($stmt->affected_rows){
     $respuesta = array(
       'respuesta' => 'exito',
       'id_insertado' => $id_insertado,
       'resultado_imagen' => $imagen_resultado
     );
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

   $directori = "../img/invitados/";
   if(!is_dir($directorio)){
     mkdir($directori, 0755, true);
   }
   if(move_uploaded_file($_FILE['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])){
     $imagen_url = $_FILES['archivo_imagen']['name'];
     $imagen_resultado = "se subió correctamente";
   }else{
     $respuesta = array(
       'respuesta' => error_get_last()
     );
   }



   try {
           if ($_FILES['archivo_imagen']['size'] > 0) {
             $stmt = $conn->prepare('UPDATE invitados SET nombre_invitados = ?, apellido_invitado = ?, descripcion =?, url_imagen = ? WHERE invitado_id = ? ');
             $stmt->bind_param("ssssi", $nombre, $apellido, $biografia, $imagen_url, $id_registro);
           }else{
             $stmt = $conn->prepare('UPDATE invitados SET nombre_invitados = ?, apellido_invitado = ?, descripcion =?  WHERE invitado_id = ? ');
             $stmt->bind_param("sssi", $nombre, $apellido, $biografia, $id_registro);
           }
           }
      $stmt->execute();
    if($estado == true) {
      $respuesta = array(
        'respuesta' => $id_registro
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
      $Stmt = $conn->prepare('DELETE FROM invitados WHERE invitado_id = ? ');
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
