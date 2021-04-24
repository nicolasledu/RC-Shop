<!DOCTYPE html>
<html lang="en" mode="ios">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RadiantChild | Index</title>
    <link rel="icon" type="image/png" href="" />
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core/css/ionic.bundle.css"/>
    <link rel="stylesheet" href="./assets/css/style.css"/>
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
            <div class="content-card">
            <a href="index.php?p=shop" class="shop-card">
                <div class="">
                    <h1 class="title-shop">Shop</h1>
                </div>
              </a>
                <a href="index.php?p=archive" class="archive-card">
                    <div>
                        <h1 class="title-archive">Archive</h1>
                    </div>
                </a>
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