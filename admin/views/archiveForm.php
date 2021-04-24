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

        
      <form action="index.php?p=archives&action=<?= isset($archive) ||  (isset($_SESSION['old_inputs']) && $_GET['action'] == 'edit') ? 'edit&id='. $_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">

        <label for="image">Image :</label>
        <input type="file" name="image" id="image" /><br>

        <input type="submit" value="Enregistrer" />

      </form>

  </ion-content>

  </ion-app>

</body>