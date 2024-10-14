<?php
session_start();
spl_autoload_register();

use Business\PostService;
use Entities\Post;
use Business\AutoService;

$autoSvc = new AutoService();
$autoData = $autoSvc->getAutoLijst();

$error = "";
unset($_SESSION["post"]);

if (isset($_POST["btnToevoegen"])) {
    $auto_id = "";
    $bouwjaar = "";
    $img = "";
    $omschrijving = "";

    if (!empty($_POST["txtAutoId"]) && ($_POST["txtAutoId"]) != 0) {
        $auto_id = $_POST["txtAutoId"];
    } else {
        $error .= "Je moet een merk kiezen.<br>";
    }

    if (!empty($_POST["txtBouwjaar"]) && ($_POST["txtBouwjaar"]) != 0) {
        $bouwjaar = $_POST["txtBouwjaar"];
    } else {
        $error .= "Het bouwjaar moet ingevuld worden.<br>";
    }

    if (!empty($_POST["txtImg"])) {         
        $img = $_POST["txtImg"];
    } else {
        $error .= "Je moet een foto uploaden.<br>";
    }

    if (!empty($_POST["txtOmschrijving"])) {
        $omschrijving = $_POST["txtOmschrijving"];
    } else {
        $error .= "De omschrijving moet ingevuld worden.<br>";
    }

    if ($error == "") {
        $post = new Post();
        $post->setUserId($_SESSION["userId"]);
        $post->setAutoId($auto_id);
        $post->setBouwjaar($bouwjaar);
        $post->setImg($img);
        $post->setOmschrijving($omschrijving);

        $postSvc = new PostService();
        $postSvc->createPost($post);
        $_SESSION["post"] = serialize($post);
        header("location: overzicht.php");
        echo "Uw post is succesvol toegevoegd.<br>";
        exit;
    }
}

if ($error != "") {
    echo "<span style=\"color:red;\">" . $error . "</span>";
}

if (!isset($_SESSION["post"])) {
    include "Presentation/header.php";
    include "Presentation/viewPostToevoegen.php";
    include "Presentation/footer.php";
}

