<?php
session_start();

unset($_SESSION["gebruiker"]);

include("Presentation/header.php");
include("Presentation/viewLogout.php");
include("Presentation/footer.php");