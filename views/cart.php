<!DOCTYPE html>
<html lang="en" mode="ios">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RadiantChild | Panier</title>
    <link rel="icon" type="image/png" href="" />
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core/css/ionic.bundle.css"/>
    <link rel="stylesheet" href="./assets/css/style.css"/>
    <link rel="stylesheet" href="./assets/css/cart.css"/>
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
            <div class="cart-all">
              <div class="cart-step"></div>
              <div class="cart-product">
              <?php $totalPriceCart = 0;?>
              <?php if(!empty($_SESSION['cart'])):?>
                <?php foreach($cartProducts as $p): ?>
                    <ion-card>
                    <img class="shopIMG" src="./assets/images/<?=$p['image']?>"/>
                        <ion-card-header>
                        <ion-card-title><h2><?= $p['name']?></h2></ion-card-title>
                        </ion-card-header>
                        <ion-card-content>
                        <p style="font-size: 17px;"><?= $p['price']?> €</p>
                        <form action="index.php?p=cart&action=upadateProductQty&product_id=<?= $p['id']?>">
                            <select name="quantity" id="quantity" class="quantity" required>
                                <option value="<?= $p['quantity'] ?>"><?= $p['quantity']?></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>

                            <select name="size" id="size">
                                <option value="<?= $p['size'] ?>"><?= $p['size']?></option>
                            </select>
                            <a href="index.php?p=cart&action=deleteProduct&product_id=<?= $p['id'] ?>"><i class="fas fa-trash-alt"></i></a>
                        </form>
                        <?php $totalPrice = $p['price'] * $p['quantity']?>
                        <?php $totalPriceCart += $totalPrice?><br>
                        </ion-card-content>
                    </ion-card>
                    <?php endforeach;?>
                <?php endif;?>
              </div>
              <div class="cart-info">
                <div class="price">
                  <h2>Total</h2>
                  <p><?= $totalPriceCart?> €</p>
                </div>
                <div class="delivery">
                  <form action="index.php?p=cart&action=insertorder&price=<?= $totalPriceCart?>" method="post" enctype="multipart/form-data">

                    <input  type="text" placeholder="Last Name" name="last_name" id="last_name" value="" required/>
                    
                    <input type="text" placeholder="First Name" name="first_name" id="first_name" required/><br>

                    <input type="text" placeholder="Phone Number" name="phonenumber" id="phonenumber" required/><br>

                    <input type="text" placeholder="Email" name="email" id="email" required/><br>

                    <input type="text" placeholder="Adress" name="adress" id="adress" required/><br>

                    <input  type="text" placeholder="Ville" name="city" id="city" required/>

                    <input type="text" placeholder="Zip Code" name="zip" id="zip" required/><br>

                    <input type="hidden" name="amount" value="<?= $totalPriceCart?>" hidden/>

                    <select name="country" id="order_id" required>
                      <option value="Europe">Europe</option>
                      <option value="Etat-Unis">Etat-Unis</option>
                      <option value="Asie">Asie</option>
                    </select><br>
                      <button type="submit" class="btn-validate">VALIDER</button>   
                  </form>
                </div>
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