<!DOCTYPE html>
<html lang="en" mode="ios">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RadiantChild | Se connecter</title>
    <link rel="icon" type="image/png" href="" />
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core/css/ionic.bundle.css"/>
    <link rel="stylesheet" href="./assets/css/style.css"/>
    <link rel="stylesheet" href="./assets/css/Login.css"/>
    <link rel="stylesheet" href="./assets/vendors/fa/css/all.min.css">
    <script type="module">
        import { menuController } from 'https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/index.esm.js';
        window.menuController = menuController;
    </script>
</head>
<body>
  
  <ion-app>
    <?php require('partials/header.php');?>
        <ion-content>
          <div class="CardLogin">
            <ion-card>
              <div class="login">
                <ion-card-header>
                  <ion-card-title>Se Connecter </br> Pour Admin</ion-card-title>
                </ion-card-header>
                <ion-card-content>
                <form action="" method="post">
                  <ion-item>
                    <ion-label position="floating">Email :</ion-label>
                    <ion-input id="email" type="email" name="email" required></ion-input>
                  </ion-item>
                  <ion-item>
                    <ion-label position="floating">Password :</ion-label>
                    <ion-input id="password" type="password" name="password" required></ion-input>
                  </ion-item>
                    <ion-button type="submit" color="success">Envoyer</ion-button>
                </form>
                </ion-card-content>
              </div>
            </ion-card>
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