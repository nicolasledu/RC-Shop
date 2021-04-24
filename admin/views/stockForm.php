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

  <?php require('partials/header.php')?>

  <ion-content>
      
				
			<?php if(isset($_SESSION['messages'])): ?>
			<div>
				<?php foreach($_SESSION['messages'] as $message): ?>
					<?= $message ?><br>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>

        
            <form action="index.php?p=stock&action=add&id=<?=$_GET['id']?>" method="post" enctype="multipart/form-data">

                <label for="name">Taille :</label>
                <input  type="text" name="size" id="size" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['size'] : '' ?><?= isset($stock) ? $stock['size'] : '' ?>" /><br>
                

                <label for="price">Quantité :</label>
                <input type="number" name="quantity" id="qty" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['quantity'] : '' ?><?= isset($stock) ? $stock['quantity'] : '' ?>"/><br>

                <input type="submit" value="Enregistrer" />

            </form>
            
  </ion-content>

  </ion-app>

<style>


form{
    text-align: center;
    margin-top: 10%;
}



</style>
</body>