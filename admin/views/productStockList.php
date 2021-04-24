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
  <div class="container">
	<div class="header">
		<?php if(isset($_SESSION['messages'])): ?>
			<div>
				<?php foreach($_SESSION['messages'] as $message): ?>
					<?= $message ?><br>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
	<div class="card-products-list">
		<ion-card>
			<ion-card-header>
			<ion-card-title>Liste des stocks :</ion-card-title>
			</ion-card-header>
		</ion-card>
	</div>
	<div class="list-products">

    <?php foreach($products as $p): ?>
        <ion-card>
            <img class="shopIMG" src="../assets/images/<?= $p['image']?>"/>
            <ion-card-header>
                <ion-card-title><?= $p['name']?></ion-card-title>
            </ion-card-header>
            <ion-card-content>
            <p style="font-size: 17px;"><?= $p['price']?>€</p><br>
            <?php $quantity = getQuantity($p['id'])?>
            <a href="index.php?p=stock&action=new&id=<?= $p['id'] ?>">ajouter une taille</a><br><br>
            <?php foreach($quantity as $q): ?>
                <?= $q['quantity']?> <?= $q['size']?>  <a href="index.php?p=stock&action=delete&id=<?= $p['id'] ?>"><i class="fas fa-trash-alt"></i></a><br>
            <?php endforeach; ?>    
            </ion-card-content>
            </ion-card>      
            <?php endforeach; ?>    
	</div>
</div>
	

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

