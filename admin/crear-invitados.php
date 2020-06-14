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
      CREAR INVITADOS
        <small>Diligenciar el formulario para crear un INVITADOS</small>
      </h1>
    </section>
  <div class="row">
      <div class="col-md-8">
    <!-- Main content -->
      <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Crear INVITADO </h3>
        </div>
        <div class="box-body">
          <!-- form start -->
              <form role="form" name"guardar-registro"  id="guardar-registro-archivo" method="post" action="modelo-invitado.php" enctype="multipart/form-data">
                <div class="box-body">

                  <div class="form-group">
                    <label for="nombre_invitado">Tu nombre:</label>
                    <input type="text" class="form-control" id="nombre_invitado" name="nombre_invitado" placeholder="Nombre.">
                  </div>
                  <div class="form-group">
                    <label for="apelliso_invitado">Apellido:</label>
                    <input type="text" class="form-control" id="apelliso_invitado" name="apelliso_invitado" placeholder="Apellido.">
                  </div>
                  <div class="form-group">
                    <label for="biografia_invitado">Biografia</label>
                    <textarea  class="form-control" id="biografia_invitado" name="biografia_invitado" rows="8" cols="80" placeholder="Biografia"></textarea>
                  </div>
                  <div class="form-group">
                  <label for="imagen_invitado">Imagen:</label>
                  <input class="form-group" type="file" id="imagen_invitado" name"archivo_imagen">

                  <p class="help-block">Añada la imagen del invitado aquí.</p>
                </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <input type="hidden" name="registro" value="nuevo">
                  <button type="submit" class="btn btn-primary" id="crear_registro_admin">Añadir</button>
                </div>
              </form>
        </div>
        <!-- /.box-body -->

      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
      </div>
</div>
  </div>
  <!-- /.content-wrapper -->

  <?php
     include_once 'templates/footer.php';
   ?>
