<?php

session_start();

require ('../helpers.php');?>
<?php if(!isset($_SESSION['user'])):?>
    <?php header('Location:../index.php');?>
<?php endif;?>

<?php
if(isset($_GET['p'])){
	switch ($_GET['p']){
        case 'archives':
			require 'controllers/archiveController.php';
		break;
        case 'products':
			require 'controllers/productController.php';
		break;
		case 'images':
            require 'controllers/imageController.php';
		break;
		case 'stock':
            require 'controllers/stockController.php';
        break;
		case 'orders' :
			require 'controllers/orderController.php';
		break;
        default :
            require 'controllers/indexController.php';
	}
}
else{
	require 'controllers/indexController.php';
}

if(isset($_SESSION['messages'])){
	unset($_SESSION['messages']);	
}
if(isset($_SESSION['old_inputs'])){
	unset($_SESSION['old_inputs']);	
}
