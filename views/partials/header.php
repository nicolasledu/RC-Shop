<?php if (isset($_GET['action']) && $_GET['action'] == 'disconnect'){
    
    unset($_SESSION['user']);
    session_destroy();
    header('Location:index.php');
}?>
<ion-menu side="start" content-id="main-content">
        <ion-header translucent="true">
            <ion-toolbar class="header-burger">
                <ion-buttons slot="start">
                <ion-menu-button auto-hide="false" class="menu-button"><i class="fas fa-times"></i></ion-menu-button>
                </ion-buttons>
        
                <ion-title class="logo-header-burger">RC</ion-title>
            </ion-toolbar>
        </ion-header>
        <ion-content>
            <ion-list>
                <ion-item>
                  <ion-label><a href="index.php?p=shop">Shop</a></ion-label>
                </ion-item>
                <ion-item>
                    <ion-label><a href="index.php?p=archive">Archives</a></ion-label>
                </ion-item>
                <ion-item>
                <?php if(!isset($_SESSION['user'])):?>
                    <ion-label><a href="index.php?p=connect">Se connecter</a></ion-label>
                <?php else:?>
                    <ion-label><a href="admin/index.php" class="">page admin</a><br></ion-label>
                    <ion-label> <a href="index.php?action=disconnect">Déconnexion !</a><br></ion-label>
                <?php endif;?>
                </ion-item>
              </ion-list>
        </ion-content>
    </ion-menu>
    <div class="ion-page" id="main-content">
        <ion-header>
        <div class="ShadowHeader">
          <ion-toolbar class="test">
                <ion-buttons slot="start">
                    <ion-menu-button auto-hide="false" class="menu-button"><i class="fas fa-bars"></i></ion-menu-button>
                    
                </ion-buttons>
                <ion-buttons slot="primary">
                    <ion-button class="cartRC">
                        <img src="./assets/images/card.png" alt="card">
                    </ion-button>
                </ion-buttons>
                <ion-title><a href="index.php" class="logo-header">RadiantChild</a></ion-title>
          </ion-toolbar>
        </div>
        </ion-header>