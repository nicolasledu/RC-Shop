<?php 

require('models/Product.php');


if($_GET['action'] == 'list'){
	$products = getAllProducts();

	require('views/productStockList.php');
}
elseif($_GET['action'] == 'new'){
	require('views/stockForm.php');
}

elseif($_GET['action'] == 'add'){
	
	if(empty($_POST['size']) || empty($_POST['quantity'])){
		
		if(empty($_POST['size'])){
			$_SESSION['messages'][] = 'Le champ taille est obligatoire !';
        }
        if(empty($_POST['quantity'])){
			$_SESSION['messages'][] = 'Le champ quantité est obligatoire !';
        }


		$_SESSION['old_inputs'] = $_POST;
		header('Location:index.php?p=stock&action=new&id=' . $_GET['id']);
		exit;
	}
	else{
		$resultAdd = addStock($_POST,$_GET['id']);
		
		$_SESSION['messages'][] = $resultAdd ? 'produit enregistré !' : "Erreur lors de l'enregistrement  ... :(";
		
		header('Location:index.php?p=stock&action=list');
		exit;
	}
}
elseif($_GET['action'] == 'edit'){
	$quantity = getQuantity($_GET['id']);
    
	if(!empty($_POST)){
		if(empty($_POST['size']) || empty($_POST['quantity'])){
		
			if(empty($_POST['size'])){
                $_SESSION['messages'][] = 'Le champ taille est obligatoire !';
            }
            if(empty($_POST['quantity'])){
                $_SESSION['messages'][] = 'Le champ quantité est obligatoire !';
            }

		
			$_SESSION['old_inputs'] = $_POST;
			header('Location:index.php?p=stock&action=edit&id=' . $_GET['id']);
			exit;
		}
		else{
			$result = updateStock($_GET['id'], $_POST);
			$_SESSION['messages'][] = $result ? 'produit mise à jour !' : 'Erreur lors de la mise à jour... :(';
			header('Location:index.php?p=stock&action=list');
			exit;
		}
	}
	else{
		if(!isset($_SESSION['old_inputs'])){
			if(isset($_GET['id'])){
				$product = getProduct($_GET['id']);
				if($product == false){
					header('Location:index.php?p=stock&action=list');
					exit;
				}
			}
			else{
				header('Location:index.php?p=stock&action=list');
				exit;
			}
        }
        $products = getAllProducts();
        $product = getProduct($_GET['id']);
		$quantity = getQuantity($_GET['id']);
		require('views/stockForm.php');
	}

}
elseif($_GET['action'] == 'delete'){
	if(isset($_GET['id'])){
		$result = deleteStock($_GET['id']);
	}
	else{
		header('Location:index.php?p=stock&action=list');
		exit;
	}

	$_SESSION['messages'][] = $result ? 'stock supprimée !' : 'Erreur lors de la suppression... :(';
	
	header('Location:index.php?p=stock&action=list');
	exit;
}