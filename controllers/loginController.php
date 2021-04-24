<?php 
require_once 'models/Login.php';



if (isset($_GET['action']) && $_GET['action'] == 'disconnect'){
    
    unset($_SESSION['user']);
    session_destroy();
    header('Location:index.php');
}

if(!empty($_POST)){
    if(empty($_POST['email']) || empty($_POST['password'])){
        echo'ERREUR';
    }
    else{
        $user = login($_POST['email'],$_POST['password']);
        if($user != false){
            $_SESSION['user'] = $user;
            header('Location:admin/index.php');
            
        }
        else{
            echo'Non valide';
        }
    }

}?>

<?php if(isset($_SESSION['user'])):?>
    salut <?= $_SESSION['user']?>
   
<?php endif; ?>
<?php include 'views/login.php';?>
    