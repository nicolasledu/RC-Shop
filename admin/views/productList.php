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
			<ion-card-title>Liste de tous les produits:</ion-card-title>
			</ion-card-header>

			<ion-card-content>
			<div class="new">
			<a href="index.php?p=products&action=new"><ion-button><ion-subtitle>Ajouter un nouveau produit <ion-icon name="add-circle-outline"></ion-icon></ion-subtitle></ion-button></a>

			</div>
			
			</ion-card-content>
		</ion-card>
	  
	</div>
	<div class="list-products">

	  <?php foreach($products as $p): ?>
		<a href="index.php?p=products&action=edit&id=<?= $p['id'] ?>">

		<div class="product-admin">
            <ion-card>
              <img class="shopIMG" src="../assets/images/<?= $p['image']?>"/>
            <ion-card-header>
              <ion-card-title><?= $p['name']?></ion-card-title>
            </ion-card-header>
            <ion-card-content>
              <p style="font-size: 17px;"><?= $p['price']?>€</p>
              <a href="index.php?p=products&action=delete&id=<?= $p['id'] ?>"><i class="fas fa-trash-alt"></i></a>
              <a href="index.php?p=images&action=list&id=<?= $p['id']?>"> Voir les images</a>
            </ion-card-content>
            </ion-card>
          </div>  
          </a>          



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

