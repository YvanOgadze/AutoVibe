<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
  <title>AutoVibe</title>
  <link rel="stylesheet" href="Opmaak/autoVibe.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <header id="header">
    <h1><a href="overzicht.php">AutoVibe</a></h1>
    <nav id="nav">
      <?php if (!isset($_SESSION["gebruiker"])) {
      ?>
        <a href="login.php">Inloggen</a>
        - <a href="registreren.php">Registreren</a>
      <?php
      } else {
      ?>

        <a href="postToevoegen.php">
          <img src="./icons/add.svg" alt="Post toevoegen icoon" class="icoonTop">
        </a>
        - <a href="profielOverzicht.php">Profiel</a>
        - <a href="logout.php"> Uitloggen</a>
      <?php
      }
      ?>
    </nav>
  </header>
  <div id="content">