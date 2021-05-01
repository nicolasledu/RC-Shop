<?php
require('models/Cart.php');
require('models/Product.php');
switch($_GET['action']){
    case 'addProduct':

        $product = getProduct($_GET['product_id']);
        $quantity = getQuantityForSize($_GET['product_id'], $_POST['size']);
        if(!empty($_POST['quantity'])){
            if( $_POST['quantity'] > 0){
                if(!isset($_SESSION['cart'])){
                    $_SESSION['cart'] = [];
                
                }
                else{
                    $_SESSION['cart'][$_GET['product_id']] = $product;
                    $_SESSION['cart'][$_GET['product_id']]['quantity'] = $_POST['quantity'];
                    $_SESSION['cart'][$_GET['product_id']]['size'] = $_POST['size'];
                }
                header('Location:index.php?p=cart&action=display');
                exit;
            }
            else{
                echo"Erreur de quantité";
            }
        
        }
        else{
            $_SESSION['messages'][] = 'Quantité non sélectionnée (ne touche pas à la console)';
            header('Location:index.php');
        }
    break;
    case 'deleteProduct':
        unset($_SESSION['cart'][$_GET['product_id']]);
        header('Location:index.php?p=cart&action=display');
        exit;
    break;
    case 'upadateProductQty':
        $_SESSION['cart'][$_GET['product_id']]['quantity'] = $_POST['quantity'];
        header('Location:index.php?p=cart&action=display');
        exit;
    break;
    case'display':
        if(!isset($cartProducts)){
            $cartProducts = [];
        }
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [];
        
        }
        if(isset($_SESSION['cart'])){
           
        foreach($_SESSION['cart'] as $product_id => $quantity){
            $cartProducts [] = display($product_id);



        }
        require('views/cart.php');
        }
    break;
    case'insertorder':

            $order = insertOrder($_POST);
            $orderId = lastInsertOrderId($_POST['email']);
            foreach($_SESSION['cart'] as $product_id => $quantity){
                $cartProducts [] = display($product_id);
            }
            foreach($cartProducts as $product){

                $price = $product['price'] * $_SESSION['cart'][$product['id']]['quantity'];
                $orderdetails = orderDetails($product,$orderId, $price, $_SESSION['cart'][$product['id']]['quantity']);
                $qtyProduct = getQuantityForSize($product['id'], $product['size']);
                $qtyRemaining = $qtyProduct['quantity'] - $_SESSION['cart'][$product['id']]['quantity'];
                $updateqty = updateQty($qtyRemaining,$product['id'], $product['size']);
            }
            
        unset($_SESSION['cart']);
        header('Location:views/paymentForm.php?price='. $_POST['amount']);
    break;

    default :
    require 'controllers/indexController.php';
}   