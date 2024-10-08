<?php
//login.php
declare(strict_types = 1);
session_start();
spl_autoload_register();

use Business\UserService;
use Entities\User;
use Exceptions\GebruikerBestaatNietException;
use Exceptions\WachtwoordenKomenNietOvereenException;

$error = "";
if (isset($_POST["btnLogin"])) {
    $username = "";
    $wachtwoord = "";

    if (!empty($_POST["txtUsername"])) {
        $username = $_POST["txtUsername"];
    } else {
        $error .= "De gebruikersnaam moet ingevuld worden.<br>";
    }

    if (!empty($_POST["txtWachtwoord"])) {
        $wachtwoord = $_POST["txtWachtwoord"];
    } else {
        $error .= "Het wachtwoord moet ingevuld worden.<br>";
    }

    if ($error == "") {
        try {
            $gebruiker = new User(null, $username, null, null, null, $wachtwoord);
            $gebruikerSvc= new UserService();
            $gebruikerSvc = $gebruikerSvc->login($gebruiker);
            $_SESSION["gebruiker"] = serialize($gebruiker);
            $_SESSION["username"] = $username;
            
            $gebruikerNieuw = new UserService();
            $gebruikerData = $gebruikerNieuw->getUserByName($username);
            $_SESSION["rol"] = $gebruikerData->getRol();
            
            $userId = $gebruiker->getUserId();
            $_SESSION["userId"] = $userId;
        } catch (WachtwoordenKomenNietOvereenException $e) {
            $error .= "Het wachtwoord is niet correct.<br>";
        } catch (GebruikerBestaatNietException $e) {
            $error .= "Er bestaat geen gebruiker met deze username.<br>";
        }
    }
}

if ($error == "" && isset($_SESSION["gebruiker"])) {
    header("location: overzicht.php");
    exit;
} else if ($error != "") {
    echo "<span style=\color:red;\">" . $error . "</span>";
}

if (!isset($_SESSION["gebruiker"])) {
    include("Presentation/header.php");
    include("Presentation/viewLogin.php");
    include("Presentation/footer.php");
}