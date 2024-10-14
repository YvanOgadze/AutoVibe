<?php
//login.php
declare(strict_types = 1);
session_start();
spl_autoload_register();

use Business\UserService;
use Entities\User;
use Exceptions\GebruikerBestaatNietException;
use Exceptions\WachtwoordenKomenNietOvereenException;

$errorUsername = "";
$errorWachtwoord = "";
if (isset($_POST["btnLogin"])) {
    $username = "";
    $wachtwoord = "";

    if (!empty($_POST["txtUsername"])) {
        $username = $_POST["txtUsername"];
    } else {
        $errorUsername .= "De gebruikersnaam moet ingevuld worden.<br>";
    }

    if (!empty($_POST["txtWachtwoord"])) {
        $wachtwoord = $_POST["txtWachtwoord"];
    } else {
        $errorWachtwoord .= "Het wachtwoord moet ingevuld worden.<br>";
    }

    if ($errorUsername == "" && $errorWachtwoord == "") {
        try {
            $gebruiker = new User(null, $username, null, $wachtwoord);
            $gebruikerSvc= new UserService();
            $gebruikerSvc = $gebruikerSvc->login($gebruiker);
            $_SESSION["gebruiker"] = serialize($gebruiker);
            $_SESSION["username"] = $username;
            
            $gebruikerNieuw = new UserService();
            $gebruikerData = $gebruikerNieuw->getUserByName($username);
            
            $userId = $gebruikerData->getUserId();
            $_SESSION["userId"] = $userId;
        } catch (WachtwoordenKomenNietOvereenException $e) {
            $errorWachtwoord .= "Het wachtwoord is niet correct.<br>";
        } catch (GebruikerBestaatNietException $e) {
            $errorUsername .= "Er bestaat geen gebruiker met deze username.<br>";
        }
    }
}

if ($errorUsername == "" && $errorWachtwoord == "" &&  isset($_SESSION["gebruiker"])) {
    header("location: overzicht.php");
    exit;
}

if (!isset($_SESSION["gebruiker"])) {
    include("Presentation/header.php");
    include("Presentation/viewLogin.php");
    include("Presentation/footer.php");
}