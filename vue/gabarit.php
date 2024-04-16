<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <title><?= $title ?></title>
    <?= $styles ?>
  </head>
  <body>
    <header>
      <?= $header ?>
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
  </body>
</html>