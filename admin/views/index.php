<!DOCTYPE html>
<html lang="en" mode="ios">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RadiantChild | Admin</title>
    <link rel="icon" type="image/png" href="" />
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core/css/ionic.bundle.css"/>
    <link rel="stylesheet" href="../assets/css/style.css"/>
    <link rel="stylesheet" href="../assets/css/Admin.css"/>
    <link rel="stylesheet" href="../assets/vendors/fa/css/all.min.css">
    <script type="module">
        import { menuController } from 'https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/index.esm.js';
        window.menuController = menuController;
    </script>

</head>
<body>
  <ion-app>
  
    <?php require('partials/header.php');?>
    
    
        <ion-content>
        <div class="welcome">
          <h1 class="title-admin">Bienvenue <?= $_SESSION['user']['username']?> !</h1>
          <div class="card-admin">
          <ion-card>
            <ion-card-header>
              <ion-card-subtitle>Menu Admin</ion-card-subtitle>
              <ion-card-title><a href="index.php?p=products&action=list">Gestion des produits</a></ion-card-title>
              <ion-card-title><a href="index.php?p=stock&action=list">Gestion des stocks</a></ion-card-title>
              <ion-card-title><a href="index.php?p=archives&action=list">Gestion des archives</a></ion-card-title>
            </ion-card-header>
          </ion-card>
          </div>
	      </div>
        </ion-content>
      </div>
  </ion-app>
  
  <script>
    async function openMenu() {
      await menuController.open();
    }
  </script>
</body>
</html>


