<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link href="style/style.css" rel="stylesheet">
    <?= $styles ?>
  </head>
  <body>
    <header>
      <?= $header ?>
      <?= $Hacceuil ?>
    </header>

    <main>
      <h2><?= $titre ?></h2>
      <?= $contenu ?>
    </main>

    <footer>
      <?= $footer ?>
    </footer>  

    <script src="script/script.js"> </script>
  </body>
</html>