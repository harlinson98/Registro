<?php
  include_once 'funciones/sesiones.php';
  include_once 'funciones/funciones.php';
  include_once 'templates/header.php';
  include_once 'templates/barra.php';
  include_once 'templates/navegacion.php';
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Listado de  Invitados.
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Administrar la lista de los invitados</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="registros" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Nombre</th>
              <th>Biografia</th>
              <th>Imagen</th>
              <th>Acciones</th>

            </tr>
            </thead>
            <tbody>
                 <?php
                 try {
                   $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_Evento, nombre_invitado, aaaapellido_invitado";
                   $sql .= " FROM eventos ";
                   $sql .= " INNER JOIN categoria_evento";
                   $sql .= " ON eventos.id_cat_evento=categoria_evento.id_categoria";
                   $sql .= " ORDER BY evento_id";
                   $resultado = $conn->query($sql);
                 } catch (Exception $e) {
                   $error = $e->getMessage();
                   echo $error;
                   }
                   while($invitado = $resultado->fetch_assoc() ) { ?>
                       <tr>
                             <td><?php echo $invitado['nombre_invitado'] . " " . $invitado['apellido_invitado']; ?></td>
                             <td><?php echo $invitado['descripcion'];?></td>
                              <td><img src= "../img/invitados/<?php echo $invitado['url_imagen'];?>" width="140"></td>

                             <td>
                                <a href="editar-invitado.php?id=<?php echo $invitado['invitado_id'] ?>" class="btn bg-orange btn-flat margin">
                                <i class="fa fa-pencil"></i>
                                </a>
                                <a href="#" data-id="<?php echo $invitado['invitado_id'] ?>" data-tipo="invitado" class="btn bg-maroon bnt-flat margin borrar_registro">
                                  <i class="fa fa-trash"></i>
                                </a>
                             </td>
                       </tr>
                  <?php  } ?>

            </tbody>
            <tfoot>
            <tr>
              <tr>
                <th>Nombre</th>
                <th>Biografia</th>
                <th>Imagen</th>
                <th>Acciones</th>
              </tr>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
     include_once 'templates/footer.php';
   ?>
