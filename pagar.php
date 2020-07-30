<?php

 if(!isset($_POST['submit'])) {
   exit("hubo un error");
 }

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

require 'includes/paypal.php';

 if(isset($_POST['submit'])):
    $nombre= $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $regalo = $_POST['regalo'];
    $total = $_POST['total_pedido'];
    $fecha = date('Y-m-d H:i:s');  // pedidos
    $boletos = $_POST['boletos'];
    $numero_boletos = $boletos;
    $pedidoExtra = $_POST['pedido_extra'];
    $camisas = $_POST['pedido_extra']['camisas']['cantidad'];//error
    $precioCamisa = $_POST['pedido_extra']['camisas']['precio'];
    $etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];
    $precioEtiquetas = $_POST['pedido_extra']['etiquetas']['precio'];
    include_once 'includes/funciones/funciones.php';
    $pedido = productos_json($boletos, $camisas, $etiquetas);      //eventos
    $eventos = $_POST['registro'];//error
    $registro = eventos_json($eventos);
      try{
      require_once('includes/funciones/bd_conexion.php');
      $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registro, fecha_registrado, pases_articulo, talleres_registrado, regalo, total_pagado ) VALUES (?,?,?,?,?,?,?,?)");
      $stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);
      $stmt->execute();
      $ID_registro = $stmt->insert_id;
      $stmt->close();
      $conn->close();
      //header('Location: validar_registro.php?exitoso=1');
    }catch(Exception $e){
      $error= $e->getMessage();
    }
endif;

   $compra = new Payer();// realiza el pago.
   $compra->setPaymentMethod('paypal');// agregar atributos a la compra. set para agregar valor y get para obtener un valor

 //leer datos
//$producto = $_POST['productos'];
//$precio = $_POST['precio'];
//$envio = 0;
//$total = $precio + $envio; productos con la suma de todos lo productos, falta la suma total del precio. implementarlo con ajax.

//$productos= ;

$producto = "1 camisa + 1 etiqueta + 1 entrada con todo pago"; //TODO:hacerlo

$articulo = new Item();
$articulo->setName($producto)
      ->setCurrency('USD')
      ->setQuantity(1)
      ->setPrice($total);

$i = 0;
$arreglo_pedido = array();
 foreach($numero_boletos as $key => $value){
   if ((int) $value['cantidad'] > 0) {
     ${"articulo$i"} = new  Item();
     $arreglo_pedido[] = ${"articulo$i"};
     ${"articulo$i"}->setName('pase: ' . $key)
                   ->setCurrency('USD')
                   ->setQuantity( (int) $value['cantidad'])
                   ->setPrice( (int) $value['precio']);
     $i++;
   }
 }
 //echo $articulo0->getQuantity();

 foreach($pedidoExtra as $key => $value){
   if ((int)$value['cantidad'] > 0) {
       if ($key == 'camisas'){
        $precio = (float) $value['precio'] *.93;
      }else{
        $precio = (int) $value['precio'];
      }
     ${"articulo$i"} = new Item();
    $arreglo_pedido[]= ${"articulo$i"};
     ${"articulo$i"}->setName('Extras: ' . $key)
             ->setCurrency('USD')
             ->setQuantity( (int) $value['cantidad'])
             ->setPrice($precio);
     $i++;
   }
 }
$listaArticulos = new ItemList();
$listaArticulos->setItems($arreglo_pedido);

$cantidad = new Amount();
$cantidad->setCurrency('USD')
          ->setTotal($total);
          //->setDetails($detalles);
//echo $total;
$transaccion = new Transaction();
$transaccion->setAmount($cantidad)
               ->setItemList($listaArticulos)
               ->setDescription('Pago ProyectoRegistro')
               ->setInvoiceNumber($ID_registro);

$redireccionar = new RedirectUrls();
$redireccionar->setReturnUrl(URL_SITIO . "/pago_finalizado.php?&id_pago={$ID_registro}")
              ->setCancelUrl(URL_SITIO . "/pago_finalizado.php?&id_pago={$ID_registro}");


$pago = new Payment();
$pago->setIntent("sale")
     ->setPayer($compra)
     ->setRedirectUrls($redireccionar)
     ->setTransactions(array($transaccion));

     try {
       $pago->create($apiContext);
     } catch (PayPal\Exception\PayPalConnectionException $pce) {
       // Don't spit out errors or use "exit" like this in production code
       echo '<pre>';
       print_r(json_decode($pce->getData()));
       exit;
       echo"</pre>";
   }

$aprobado = $pago->getApprovalLink();
header("Location: {$aprobado}");
