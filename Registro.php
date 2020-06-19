<?php include_once 'includes/templates/header.php';?>

  <section class="seccion contenedor">
    <h2>Registro de usuarios</h2>

    <form id="registro"  class="registro" action="pagar.php" method="post">
      <div id="datos_usuario" class="regristro caja clearfix">
         <div class="campo">
           <label for="nombre">Nombre:</label>
           <input type="text" id="nombre" name="nombre" placeholder="Tu nombre">
         </div>
         <div class="campo">
           <label for="apellido">Apellido:</label>
           <input type="text" id="apellido" name="apellido" placeholder="Tu Apellido">
         </div>
         <div class="campo">
           <label for="email">Email:</label>
           <input type="email" id="email" name="email" placeholder="Tu Email">
         </div>
         <div id="error"></div>
      </div><!--datos_usuario-->

      <div id="paquetes" class="paquetes">
          <h3>elige el número de boletos</h3>

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
                <div class="orden">
                  <label for="pase_dia">boletos deseados:</label>
                  <input type="number" min="0" id="pase_dia" size="3" name="boletos[un_dia][cantidad]"  placeholder="0">
                  <input type="hidden" values="30" name="boletos[un_dia][precio]">
                </div>
              </div>
            </li>
            <li>
              <div class="tabla-precio">
                <h3>pase todos los día</h3>
                <p class="numero">$50</p>
                <ul>
                  <li>conferencia 1</li>
                  <li>conferencia 2</li>
                  <li>Tallere 3</li>
                </ul>
                <div class="orden">
                  <label for="pase_completo">boletos deseados:</label>
                  <input type="number" min="0" id="pase_completo" size="3" name="boletos[completo][cantidad]" placeholder="0">
                  <input type="hidden" values="50" name="boletos[completo][precio]">

                </div>
              </div>
            </li>
            <li>
              <div class="tabla-precio">
                <h3>pase por 2 días (Viernes y sábado)</h3>
                <p class="numero">$45</p>
                <ul>
                  <li>conferencia 1</li>
                  <li>conferencia 2</li>
                  <li>conferencia 3</li>
                </ul>
                <div class="orden">
                  <label for="pase_dosdias">boletos deseados:</label>
                  <input type="number" min="0" id="pase_dosdias" size="3" name="boletos[2dias][cantidad]" placeholder="0">
                  <input type="hidden" values="45" name="boletos[2dias][precio]">
                </div>
              </div>
            </li>
          </ul>
      </div><!--paquetes-->

      <div id="eventos" class="eventos clearfix">
                         <h3>Elige tus talleres</h3>
                         <div class="caja">
                           <?php
                           try {
                             require_once('includes/funciones/bd_conexion.php');
                             $sql = " SELECT eventos.*, categoriaevento.cat_evento, invitados.nombre_invitado, invitados.apellido_invitado";
                             $sql .= " FROM eventos ";
                             $sql .= " JOIN categoriaevento";
                             $sql .= " ON eventos.id_cat_evento = categoriaevento.id_categoria";
                             $sql .= " JOIN invitados ";
                             $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                             $sql .= " ORDER BY eventos.fecha_evento, eventos.id_cat_evento, eventos.hora_evento";
                            // echo $sql;
                             $resultado = $conn->query($sql);
                           } catch (Exception $e) {
                             echo $e->getMessage();
                           }

                           $eventos_dias = array();
                           while($eventos = $resultado->fetch_assoc()){

                             $fecha = $eventos['fecha_evento'];
                             setlocale(LC_ALL, 'es_ES');
                             $dia_semana = strftime("%A", strtotime($fecha));

                             $categoria = $eventos['cat_evento'];
                             $dia = array(
                               'nombre_evento' => $eventos['nombre_evento'],
                               'hora' => $eventos['hora_evento'],
                               'id' => $eventos['evento_id'],
                               'nombre_invitado' => $eventos['nombre_invitado'],
                               'apellido_invitado' => $eventos['apellido_invitado']
                             );
                             $eventos_dias[$dia_semana]['eventos'][ $categoria][] = $dia;
                           }
                            ?>

                            <?php foreach ($eventos_dias as $dia => $eventos) { ?>
                              <div id="<?php echo str_replace('á','a', $dia); ?>" class="contenido-dia clearfix">
                                <h4><?php echo $dia; ?></h4>

                                <?php foreach($eventos['eventos'] as $tipo => $evento_dia): ?>
                                  <div class="">

                                    <p><?php echo $tipo; ?></p>

                                    <?php foreach($evento_dia as $evento) { ?>
                                         <label><input type="checkbox" name="registro[]" id="<?php echo $evento['id']; ?>" value="<?php echo $evento['id']; ?>">
                                          <time><?php echo $evento['hora'];?></time><?php echo $evento['nombre'];?><br>
                                          <span class="autor"><?php echo $evento['nombre_invitado']. " ". $evento['apellido_invitado'] ?></span>
                                        </label>
                                    <?php } //foreach ?>
                                    </div>
                                  <?php endforeach; ?>
                              </div>
                            <?php } ?>

                           </div><!--.caja-->
                     </div> <!--#eventos-->

                     <div id="resumen" class="resumen">
                       <h3>Pagos y extras</h3>
                       <div class="caja clearfix">
                         <div class="extras">
                           <div class="orden">
                             <label for="camisa_evento">Camisa del evento $10 <small>(promocion 7% descuento)</small></label>
                             <input type="number" min="0"  id="camisa_evento" = name="pedido_extra[camisas][cantidad]" size="3"  placeholder="0">
                             <imput type="hidden" value="10" name="pedido_extra[camisas][precio]">
                           </div> <!--orden-->
                           <div class="orden">
                             <label for="etiquetas">Paquete de 10 etiquetas $2 <small>(Velas Japonesas, Valanza, Psicologia del trading)</small></label>
                             <input type="number" min="0"  id="etiquetas" name="pedido_extra[etiquetas][cantidad]" size="3"  placeholder="0">
                             <imput type="hidden" value="2" name="pedido_extra[etiquetas][precio]">
                           </div><!--orden-->
                           <div class="orden">
                             <label for="regalo">Seleccione un regalo</label><br>
                             <select id="regalo" name="regalo" required>
                               <option value="">--Seleccione un regalo--</option>
                               <option value="2">Etiquetas</option>
                               <option value="1">Oso</option>
                               <option value="3">Toro</option>
                             </select>
                           </div><!--orden-->
                           <input type="button" id="calcular" class="button" value="calcular">
                         </div><!--Extras-->

                         <div class="total">
                           <p>Resumen</p>
                           <div id="Lista-productos">
                           </div>
                           <p>Total</p>
                           <div id="suma-total">

                          </div>
                          <input type="hidden"  name="total_pedido" id="total_pedido" >
                          <input id="btnRegistro" type="submit" name="submit" class="button" value="pagar">
                         </div><!--.total-->

                       </div><!--.caja-->
                     </div><!--resumen-->
    </form>
  </section>



<?php include_once 'includes/templates/footer.php'; ?>
