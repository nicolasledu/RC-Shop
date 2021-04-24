<?php
require('helpers.php');
session_start();
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

if(isset($_GET['p'])):
    switch ($_GET['p']):
        case 'archive' :
            require 'controllers/archiveController.php';
            break;
        case 'shop' :
            require 'controllers/shopController.php';
            break;
        case 'product' :
            require 'controllers/productController.php';
            break;
        case 'connect' :
            require 'controllers/loginController.php';
            break;
        case 'cart':
            require 'controllers/cartController.php';
            break; 
        default :
            require 'controllers/indexController.php';
    endswitch;
else:
    require 'controllers/indexController.php';
endif;
