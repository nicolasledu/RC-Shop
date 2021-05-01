<?php

require('models/Success.php');

switch($_GET['action']){
    case 'SuccessOrder':

        $payment = updatePayment($_GET['email']);
        header('Location:views/success.php');
        
    break;

    default :
    require 'controllers/indexController.php';
}   