<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>HACK_THE_PLANET</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="assets/style.css"/>
  <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/ui-darkness/jquery-ui.css"/>
  <script src="assets/bundle.js"></script>
</head>
<body>
<div id="wrapper">
  <header>
    <?php include 'header.php' ?>
  </header>
  <aside class="flash"><?php include 'flash.php' ?></aside>
  <nav>
    <?php include 'nav.php' ?>
  </nav>
  <main>
    <?php include $template; ?>
  </main>
  <footer>
    <?php include 'footer.php' ?>
  </footer>
</div>
</body>
</html>
