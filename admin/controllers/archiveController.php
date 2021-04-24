<?php 

require('models/Archive.php');


if($_GET['action'] == 'list'){
    $archives = getAllArchives();
    require('views/archiveList.php');
}

elseif($_GET['action'] == 'new'){
    require('views/archiveForm.php');
}

elseif($_GET['action'] == 'add'){
    
    if(empty($_FILES['image']['tmp_name'])){
        
        if(empty($_FILES['image']['tmp_name'])){
            $_SESSION['messages'][] = 'Le champ image est obligatoire !';
        }
        header('Location:index.php?p=archives&action=new');
        exit;
    }
    else{
        $resultAdd = addArchive($_POST);
        
        $_SESSION['messages'][] = $resultAdd ? 'archive enregistrée !' : "Erreur lors de l'enregistrement  ... :(";
        
        header('Location:index.php?p=archives&action=list');
        exit;
    }
}


elseif($_GET['action'] == 'delete'){
    if(isset($_GET['id'])){
        $result = deleteArchive($_GET['id']);
    }
    else{
        header('Location:index.php?p=archives&action=list');
        exit;
    }

    $_SESSION['messages'][] = $result ? 'archive supprimée !' : 'Erreur lors de la suppression... :(';
    
    header('Location:index.php?p=archives&action=list');
    exit;
}