<?php include_once 'includes/templates/header.php';
use PayPal\Rest\ApiContext;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Payment;
require 'includes/paypal.php';

?>
<section class="seccion contenedor">
  <h2>Resumen registro</h2>
        <?php
            $resultado = (bool) $_GET['exito'];
            $paymentId = $_GET['paymentId'];
            $id_pago = (int) $_GET['id_pago']

              //peticion a REST Api
              $pago = Payment::get($paymentId, $apiContext);
              $execution = new PaymentExecution();
              $execution->setPayerId( $_GET['PayerID']);
             //resultados contiene la informacion de la transacción
              $resultado = $pago->execute($execution, $apiContext);
              $repuesta = $resultado->transactions[0]->related_resources[0]->sale->state;
              //var_dum($respuesta);

            /*  echo"<pre>"
              var_dum($resultado);
              echo"</pre>"*/



            if($respuesta == "completed") {
                  echo "<div class='resultado correcto'>";
                  echo "El pago se realizo correctamente! ";
                  echo "El id es {$paymentId} ";
                  echo "</div>";

                  require_once('includes/funciones/bd_conexion.php');
                  $stmt = $conn->prepare('UPDATE registrados SET pagado = ? WERE ID_registrado = ?');
                  $pagado = 1;
                  $stmt->bind_param('ii',$pagado,  $id_pago );
                  $stmt->execute();
                  $stmt->close();
                  $conn->close();
            }else{
              echo "<div class='resultado correcto'>";
              echo "el pago no se realizo";
              echo "</div>";
            }

         ?>
    </div>


</section>

<?php include_once 'includes/templates/footer.php';?>
