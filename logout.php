<?php
session_start();

unset($_SESSION["gebruiker"]);

include("Presentation/viewLogout.php");