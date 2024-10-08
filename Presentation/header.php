<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
  <title>AutoVibe</title>
  <link rel="stylesheet" href="Opmaak/autoVibe.css">
</head>

<body>
<h1>AutoVibe</h1>
  <nav id="nav">
    <?php if (!isset($_SESSION["gebruiker"])) {
    ?>
      - <a href="login.php">Inloggen</a>
      - <a href="registreren.php">Registreren</a>
    <?php
    } else {
    ?>
      - <a href="gebruikerOverzicht.php">Profiel</a>
      - <a href="logout.php"> Uitloggen</a>
    <?php
    }
    ?>
  </nav>