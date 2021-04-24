<!DOCTYPE html>
<html lang="en" mode="ios">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RadiantChild | Shop</title>
    <link rel="icon" type="image/png" href="" />
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core/css/ionic.bundle.css"/>
    <link rel="stylesheet" href="./assets/css/style.css"/>
    <link rel="stylesheet" href="./assets/css/Shop.css"/>
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
        <div class="ContentShop">
        <?php foreach($products as $p): ?>
          <div class="productsRC">
            <a href="index.php?p=product&product_id=<?= $p['id'] ?>">
            <ion-card>
              <img class="shopIMG" src="./assets/images/<?= $p['image']?>"/>
            <ion-card-header>
              <ion-card-title><?= $p['name']?></ion-card-title>
            </ion-card-header>
            <ion-card-content>
              <p style="font-size: 17px;"><?= $p['price']?>€</p>
            </ion-card-content>
            </ion-card>
          </div>  
          </a>        
           <?php endforeach;?>
        </div>
      </ion-content>
  </ion-app>
  <script>
    async function openMenu() {
      await menuController.open();
    }
  </script>
</body>
</html>