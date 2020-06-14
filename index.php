
<?php include_once 'includes/templates/header.php'; ?>
  <section class="seccion contenedor">
    <h2>LA mejor conferencia de Negosios Digitales</h2>
    <p>Con la evolución tecnológica, hemos podido ver cambios en los Digital Business y en sus nuevos modelos de negocios digitales.
     Gracias a ello han surgido en empresas de varios sectores como los medios de comunicación,
     las aerolíneas, el turismo o los intermediarios financieros. Ya estamos ante una era en la que la forma en que una empresa maneja su relación con los consumidores superará al actual modelo de intermediación de empresa a empresa.</p>
  </section><!--seccion-->

  <section class="programa">
    <div class="contenedor-video">
      <video  autoplay loop poster = "bg-talleres.jpg">
        <source src="video/video.mp4" type="video/mp4">
        <source src="video/video.webm" type="video/webm">
        <source src="video/video.ogv" type="video/ogv">
      </video>
    </div><!--.contenedor-video-->
    <div class="contenido-programa">
      <div class="contenedor">
        <div class="programa-evento">
          <h2>Programa del Evento</h2>


            <?php
            try{
              require_once('includes/funciones/bd_conexion.php');
              $sql = " SELECT * FROM `categoriaevento`; ";
              $resultado = $conn->query($sql);
            }catch(\Exception $e){
            $error = $e->getMessage();
            }
            ?>

          <nav class="menu-programa">
            <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
              <?php $categoria = $cat['cat_evento']; ?>
              <a href="#<?php echo strtolower($categoria) ?>">
              <i class="fa <?php echo $cat['icono'] ?>" aria-hidden="true"></i><?php echo $categoria ?>
              </a>
            <?php  } ?>
          </nav>

        <?php

        try{
          require_once('includes/funciones/bd_conexion.php');
          $sql = " SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `icono`, `nombre_invitado`, `apellido_invitado` ";
          $sql .= "FROM `eventos` ";
          $sql .=  "INNER JOIN `categoriaevento` ";
          $sql .= " ON eventos.id_cat_evento=categoriaevento.id_categoria ";
          $sql .= " INNER JOIN `invitados` ";
          $sql .= " ON eventos.id_inv=invitados.invitado_id ";
          $sql .= "AND eventos.id_cat_evento = 1";
          $sql .= " ORDER BY `evento_id` LIMIT 2;";
          $sql .= " SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `icono`, `nombre_invitado`, `apellido_invitado` ";
          $sql .= "FROM `eventos` ";
          $sql .=  "INNER JOIN `categoriaevento` ";
          $sql .= " ON eventos.id_cat_evento = categoriaevento.id_categoria ";
          $sql .= " INNER JOIN `invitados` ";
          $sql .= " ON eventos.id_inv = invitados.invitado_id ";
          $sql .= "AND eventos.id_cat_evento = 2";
          $sql .= " ORDER BY `evento_id` LIMIT 2; ";
          $sql .= " SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `icono`, `nombre_invitado`, `apellido_invitado` ";
          $sql .= "FROM `eventos` ";
          $sql .=  "INNER JOIN `categoriaevento` ";
          $sql .= " ON eventos.id_cat_evento = categoriaevento.id_categoria ";
          $sql .= " INNER JOIN `invitados` ";
          $sql .= " ON eventos.id_inv = invitados.invitado_id ";
          $sql .= "AND eventos.id_cat_evento = 3";
          $sql .= " ORDER BY `evento_id` LIMIT 2; ";
        }catch(\Exception $e){
          $error= $e->getMessage();
        }
        ?>

        

          <?php $conn->multi_query($sql); ?>
          <?php
            do {
              $resultado = $conn->store_result();
              $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>
          <?php $i = 0; ?>
          <?php foreach($row as $evento): ?>
          <?php  if($i % 2 == 0) { ?>
              <div id="<?php echo strtolower($evento ['cat_evento']) ?>" class="info-curso  ocultar clearfix">
            <?php } ?>
              <div class="detalle-evento">
                <h3> <?php  echo utf8_encode($evento['nombre_evento'])?> </h3>
                <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $evento['hora_evento'];?> </p>
                <p><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $evento['fecha_evento'];?></p>
                <p> <i class="fa fa-user" aria-hidden="true"></i><?php echo $evento['nombre_invitado'];?></p>
              </div>

              <a href="#" class="button float-right">Ver todos</a>
             <?php if($i % 2 == 1): ?>

             </div><!--.talleres-->
           <?php endif;  ?>

           <?php $i++; ?>
         <?php endforeach; ?>
        <?php $resultado->free(); ?>

            <?php } while ($conn->more_results( ) && $conn->next_result()); ?>






        </div><!--.programa-evento-->
      </div><!--.contenedor-->
    </div><!--.contenido-programa-->

  <?php include_once 'includes/templates/invitados.php'; ?>

  <div class="contador parallax">
    <div class="contenedor">
      <ul class="resumen-evento clearfix">
        <li><p class="numero"></p> Invitados </li>
        <li><p class="numero"></p> talleres </li>
        <li><p class="numero"></p> Días</li>
        <li><p class="numero"></p> Conferencia</li>
    </ul>
    </div>
  </div><!--contador-->

<section class="precios seccion">
  <h2>Precios</h2>
  <div class="contenedor">
    <ul class="lista-precios clearfix">
      <li>
        <div class="tabla-precio">
          <h3>pase por día</h3>
          <p class="numero">$30</p>
          <ul>
            <li>conferencia 1</li>
            <li>conferencia 2</li>
            <li>taller 1</li>
          </ul>
          <a href="#" class="button hollow">Compras</a>
        </div>
      </li>
      <li>
        <div class="tabla-precio">
          <h3>pase por dos día</h3>
          <p class="numero">$50</p>
          <ul>
            <li>conferencia 1</li>
            <li>conferencia 2</li>
            <li>Tallere 3</li>
          </ul>
          <a href="#" class="button hollow">Compras</a>
        </div>
      </li>
      <li>
        <div class="tabla-precio">
          <h3>pase por todos día</h3>
          <p class="numero">$45</p>
          <ul>
            <li>conferencia 1</li>
            <li>conferencia 2</li>
            <li>conferencia 3</li>
          </ul>
          <a href="#" class="button hollow">Compras</a>
        </div>
      </li>
    </ul>
  </div>
</section><!--precios seccion-->

<div id= "mapa" class="mapa"></div><!--mapa-->
<section class="seccion">
  <h2>Testimoniales</h2>
  <div class="testimoniales contenedor clearfix">
   <div class="testimonial">
     <blockquote >
       <p>El trading se basa principalmente en el análisis técnico, el análisis fundamental y la aplicación de una estrategia concreta para operar. </p>
        <footer class="info-testimonial clearfix">
           <img src="img/testimonial.jpg" alt="imagen testimonial">
           <cite>Juan Haner Castillo Ureña <span>Chef @kitchen </cite>
        </footer>
     </blockquote>
   </div><!--testimonial-->
   <div class="testimonial">
     <blockquote >
       <p>El trading se basa principalmente en el análisis técnico, el análisis fundamental y la aplicación de una estrategia concreta para operar. </p>
        <footer class="info-testimonial clearfix">
           <img src="img/testimonial.jpg" alt="imagen testimonial">
           <cite>Juan Haner Castillo Ureña <span>Chef @kitchen </cite>
        </footer>
     </blockquote>
   </div><!--testimonial-->
   <div class="testimonial">
     <blockquote >
       <p> El trading se basa principalmente en el análisis técnico, el análisis fundamental y la aplicación de una estrategia concreta para operar. </p>
        <footer class="info-testimonial clearfix">
           <img src="img/testimonial.jpg" alt="imagen testimonial">
           <cite>Juan Haner Castillo Ureña <span>Chef @kitchen </cite>
        </footer>
     </blockquote>
   </div><!--testimonial-->
 </div><!--testimoniales-->
</section>

<div class="newsletter parallax">
  <div class="contenido contenedor">
    <p>registrate al newsletter:</p>
    <h3>gdlwebcamp</h3>
    <a href="#" class="button transparente">Registros</a>
  </div>
</div><!--newsletter-->

<section class="seccion">
  <h2>Faltan</h2>
  <div class="cuenta-regresiva contenedor">
    <ul class="clearfix">
      <li> <p id="dias" class="numero"></p>Día</li>
      <li> <p id="horas" class="numero"></p>Horas</li>
      <li> <p id="minutos" class="numero"></p>Minutos</li>
      <li> <p id="segundos" class="numero"></p>Segundos</li>
    </ul>
  </div><!--cuenta-regresiva-->
</section><!--seccion-->

<?php include_once 'includes/templates/footer.php'; ?>
