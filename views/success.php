<!DOCTYPE html>
<html lang="en" mode="ios">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RadiantChild | Success</title>
    <link rel="icon" type="image/png" href="" />
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core/css/ionic.bundle.css"/>
    <link rel="stylesheet" href="../assets/css/style.css"/>
    <link rel="stylesheet" href="../assets/css/order.css"/>
    <link rel="stylesheet" href="../assets/vendors/fa/css/all.min.css">
    <script type="module">
        import { menuController } from 'https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/index.esm.js';
        window.menuController = menuController;
    </script>

</head>
<body>
  <ion-app>
      <ion-header>
              <div class="ShadowHeader">
              <ion-toolbar class="test">
                      <ion-title><a  class="logo-header">RadiantChild</a></ion-title>
              </ion-toolbar>
              </div>
              </ion-header>
          <ion-content>
              <div class="contentCart">
                  <ion-card class="cart">
                      <ion-card-content>
                        <ion-card-title>Ton achat a été enregistré ! </ion-card-title>
                          <div class="success">
                            <ion-card-subtitle>verifiez vos Email et ou vos SMS pour les infomrations de suivie.</ion-card-subtitle>
                          </div>
                        <ion-button color="success">Retour a L'acceuil</ion-button>     
                      </ion-card-content>
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