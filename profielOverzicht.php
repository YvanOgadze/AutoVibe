<?php
declare(strict_types = 1);
session_start();
spl_autoload_register();

use Business\UserService;
use Entities\User;
use Business\PostService;

$gebruikerSvc = new UserService();
$gebruikerData = $gebruikerSvc->getUserByUserId($_SESSION["userId"]);
$gebruiker = new User($gebruikerData->getUserId(), $gebruikerData->getUserName(), $gebruikerData->getBio(), $gebruikerData->getWachtwoord(), $gebruikerData->getProfielfoto());

$postSvc = new PostService();
$posts = $postSvc->getPostByUserId($gebruikerData->getUserId());

include "Presentation/header.php";
include "Presentation/viewProfielOverzicht.php";
include "Presentation/footer.php";