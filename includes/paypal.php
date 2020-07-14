<?php

//url aquispe
require 'includes/paypal/autoload.php';
define('URL_SITIO', 'http://localhost:8080/Proyecto_Registro');



$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AarFa6G4IyY38aEUtK-RUljPfTLWoTrxZpVL62DO6imT_ZH62zYqo5Zyo_dox7TWit9LH5luPR88kN_f',     // ClientID
        'EOv-RHjgLbQlPz80XgHMqnk8f6dQOjZz_ddhwKwvBuQ7c7TstRow8f5Y0YM8Z95CL1zQjR_FDtRMden9'      // ClientSecret
    )
);
