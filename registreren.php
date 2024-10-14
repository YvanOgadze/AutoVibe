<?php
session_start();
spl_autoload_register();

use Business\UserService;
use Entities\User;
use Exceptions\GebruikerBestaatAlException;
use Exceptions\WachtwoordenKomenNietOvereenException;

$errorUsername = "";
$errorWachtwoord = "";

if (isset($_POST["btnRegistreer"])) {
    $username = "";
    $wachtwoord = "";
    $wachtwoordHerhaal = "";

    //CONTROLE OP LEGE INGAVE
    if (!empty($_POST["txtUsername"])) {
        $username = $_POST["txtUsername"];
    } else {
        $errorUsername .= "De gebruikersnaam moet ingevuld worden.<br>";
    }

    if (!empty($_POST["txtBio"])) {
        $bio = $_POST["txtBio"];
    } else {
        $bio = "Ik heb geen bio :(";
    }

    if (!empty($_POST["txtWachtwoord"]) && !empty($_POST["txtWachtwoordHerhaal"])) {
        $wachtwoord = $_POST["txtWachtwoord"];
        $wachtwoordHerhaal = $_POST["txtWachtwoordHerhaal"];
    } else {
        $errorWachtwoord .= "Beide wachtwoordvelden moeten ingevuld worden.<br>";
    }
    
    // ALS ER GEEN ERRORS ZIJN, VOER ONDERSTAANDE CODE UIT
    if ($errorUsername == "" && $errorWachtwoord == "") {
        try {
            $gebruiker = new User();
            $gebruiker->setUserName($username);
            $gebruiker->setBio($bio);
            $gebruiker->setWachtwoord($wachtwoord, $wachtwoordHerhaal);
            $gebruiker->setProfielfoto("default_profile_pic.avif");
            
            $GebruikerSvc = new UserService();
            $GebruikerSvc->register($gebruiker);
            $_SESSION["gebruiker"] = serialize($gebruiker);
            $_SESSION["username"] = $username;

            $newGebruikerSvc = new UserService();
            $newGebruiker = $newGebruikerSvc->getUserByName($username);
            $userId = $newGebruiker->getUserId();
            $_SESSION["userId"] = $userId;

        } catch (WachtwoordenKomenNietOvereenException $e) {
            $errorWachtwoord .= "De ingevulde wachtwoorden komen niet overeen.<br>";
        } catch (GebruikerBestaatAlException $e) {
            $errorUsername .= "Er bestaat al een gebruiker met deze gebruikersnaam.<br>";
        }         
    }
}

if ($errorUsername == "" && $errorWachtwoord == "" && isset($_SESSION["gebruiker"])) {
    header("location: overzicht.php");
    exit;
}

if (!isset($_SESSION["gebruiker"])) {
    include("Presentation/header.php");
    include("Presentation/viewRegistreren.php");
    include("Presentation/footer.php");
}