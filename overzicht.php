<?php
declare(strict_types=1);
session_start();
spl_autoload_register();

use Business\AutoService;
use Business\PostService;
use Business\UserService;

$autoSvc = new AutoService();

$postSvc = new PostService();
$postLijst = $postSvc->getPostLijst();

$userSvc = new UserService();

/* DIT IS VOOR DE FILTER OP AUTO
if (isset($_POST["btnSelecteerConsole"])) {
    $keuzeConsole = (int)$_POST["keuzeConsole"];
    if ($keuzeConsole === 0) {
        $consoleLijst = "";
        $consoleLijst = $consolesvc->getConsoleLijst();
    } else {
        $consoleLijst = "";
        $consoleLijst = $consolesvc->getConsoleById($keuzeConsole);
    }
}
*/

/* DIT IS VOOR DE FILTER OP BOUWJAAR
if (isset($_POST["btnSelecteerBouwjaar"])) {
    $keuzeGenre = (int)$_POST["keuzeGenre"];
}
*/

include "Presentation/header.php";
include "Presentation/viewOverzicht.php";
include "Presentation/footer.php";