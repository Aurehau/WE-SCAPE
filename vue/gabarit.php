<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
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
      <?= $contenu ?>
    </main>

    <footer>
      <?= $footer ?>
    </footer>

    <script src="https://uicdn.toast.com/tui.code-snippet/latest/tui-code-snippet.min.js"></script>
    <script src="https://uicdn.toast.com/tui-calendar/latest/tui-calendar.js"></script>
    <script src="script/calendrier.js"></script>

    <script src="script/traduction.js"> </script>
    <script src="script/script.js"> </script>
    <script src="script/test.js"> </script>
  </body>
</html>