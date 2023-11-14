<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Mooli&display=swap"
      rel="stylesheet"
    />
        <title><?= $viewData["pageTitle"] ?></title>

        <!-- Core theme CSS -->
        <link href="<?= $_SERVER['BASE_URI'] ?>/assets/css/reset.css" rel="stylesheet" />
        <link href="<?= $_SERVER['BASE_URI'] ?>/assets/css/style.css" rel="stylesheet" />
        </head>
  <body>
    <header>
      <a href="<?=$_SERVER['BASE_URI']?>">
          <div class="container">
            <p><span>Aurélien GUERN</span></p>
            <p><span>Portfolio</span></p>
          </div>
          <div id="container">
            <span id="text1"></span>
            <span id="text2"></span>
              </div>
      </a>
    
    </header>

    <nav class="liens">
              <a id="mail" href="mailto:aurelien.guern@gmail.com"><img src="<?=$_SERVER['BASE_URI']?>/assets/images/email.png" /></a>
              <a href="https://www.linkedin.com/in/aur%C3%A9lien-g-8aa253193/" target="_blank  "><img id="linkedin" src="<?=$_SERVER['BASE_URI']?>/assets/images/linkedin.png" alt="logo linkedin" /></a>
              <a href="https://github.com/AurelienGuern" target="_blank  "><img id="GitHub" src="<?=$_SERVER['BASE_URI']?>/assets/images/github-logo.png" alt="logo linkedin" /></a>
          </nav>
          <main>
         
  