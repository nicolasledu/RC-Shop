<!DOCTYPE html>
<html lang="en" mode="ios">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php foreach($product as $p): ?>
    <title>RadiantChild | <?= $p['name']?></title>
    <?php endforeach;?>
    <link rel="icon" type="image/png" href="" />
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core/css/ionic.bundle.css"/>
    <link rel="stylesheet" href="./assets/css/style.css"/>
    <link rel="stylesheet" href="./assets/css/Product.css"/>
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
          <div class="product-shop">
          <?php foreach($product as $p): ?>
            <div class="product-detail">
              <div class="product-img">
                <img src="./assets/images/<?= $p['image']?>"/>
              </div>
              <div class="product-price">
                <h1><?= $p['name']?></h1>
                <p><?= $p['price']?> €</p>

                <form class="product-size" action="index.php?p=cart&action=addProduct&product_id=<?= $p['id'] ?>" method="POST">
                <div class="qty-size">
                  <label>Quantité: </label>
                  <input type="number" id="quantity" name="quantity" min="1" class="quantity" required>
                  <br>
                  <select name="sizes">
                    <?php foreach($quantity as $q): ?>
                    <?php if($q['quantity'] > 0):?>
                      <option value="<?= $q['size']?>"><?=$q['size']?></option>
                    <?php endif;?>
                    <?php endforeach;?>
                  </select>
                </div>
                  <br><br><br>
                  <button class="add-cart" type="submit">Ajouter au panier</button>
                </form>
                
              </div>
            </div> 
            <div class="imgs">
              <?php foreach($images as $i): ?>
                  <img src="./assets/images/<?= $i['name']?>" alt="">
              <?php endforeach;?>
            </div>
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