<?php
require '../vendor/autoload.php';

$key = require('config.php');

\Stripe\Stripe::setApiKey($key['key']);

Stripe\Customer::create(array(
    "description"=>"client",
    "email"=>$_POST['email'],


));

$charge = \Stripe\Charge::create(array(
    "amount"=> $_GET['price'] * 100,
    "currency"=>"eur",
    "source"=>$_POST['stripeToken'],
    "description"=>"client de RadiantChild",
));

header('Location:../index.php?p=payment&action=SuccessOrder&email='. $_POST['email']);
var_dump($charge->values());