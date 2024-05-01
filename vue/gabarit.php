<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <title><?= $title ?></title>
    <link href="style/style.css" rel="stylesheet">
    <?= $styles ?>
  </head>
  <body>
    <header>
      <?= $header ?>
      <?php 
      /* var_dump($_SESSION['panier']);
      var_dump($_SESSION['acces']); */
      ?>
      <?= $Hacceuil ?>
    </header>

    <main>
      <?= $contenu ?>
    </main>

    <footer>
      <?= $footer ?>
    </footer>



    <script src="script/traduction.js"> </script>
    <script src="script/script.js"> </script>
    <script src="script/test.js"> </script>
    <script src="script/ajouterEscape.js"> </script>

  </body>
</html>