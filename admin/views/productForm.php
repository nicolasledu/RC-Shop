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
  
  <div class="container-admin-form">
		<div class="header">
			<?php if(isset($_SESSION['messages'])): ?>
			<div>
				<?php foreach($_SESSION['messages'] as $message): ?>
					<?= $message ?><br>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>
        
		<form action="index.php?p=products&action=<?= isset($product) ||  (isset($_SESSION['old_inputs']) && $_GET['action'] == 'edit') ? 'edit&id='. $_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">

			<label for="name">Nom :</label>
			<input  type="text" name="name" id="name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?><?= isset($product) ? $product['name'] : '' ?>" /><br>
			
			<label for="image">Image :</label>
			<input type="file" name="image" id="image" /><br>

			<label for="price">Prix :</label>
			<input type="number" name="price" id="price" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['price'] : '' ?><?= isset($product) ? $product['price'] : '' ?>"/>€<br>

            <select name="order_id" id="order_id">
					
						<option value="4">Accessoire de tête</option>
                        <option value="3">Haut</option>
                        <option value="2">Pantalon</option>
                        <option value="1">Chaussures</option>

			</select><br>

			
			<input type="submit" value="Enregistrer" />

		</form>

</div>
  </ion-content>

  </ion-app>
<style>


form{
  text-align: center;
  margin-top: 10%;
}



</style>
</body>