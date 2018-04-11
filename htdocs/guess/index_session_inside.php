<?php

namespace Siaa17\Guess;

require __DIR__ . "/config.php";
require __DIR__ . "/../../vendor/autoload.php";

session_name("Siaa17");
session_start();


// For the view
$title = "Guess my number (SESSION inside)";


// Get incoming
$_SESSION["number"] = -1;
$_SESSION["tries"] = 6;
$_SESSION["guess"] = null;

// Start the game
if (!isset($_SESSION["game"])) {
    $_SESSION["game"] = new Guess($_SESSION["number"], $_SESSION["tries"]);
}

// Reset
if (isset($_POST["reset"])) {
    $_SESSION["game"] = new Guess($_SESSION["number"], $_SESSION["tries"]);
}

// Guess
$_SESSION["res"] = null;

if (isset($_POST["doGuess"])) {
    $_SESSION["guess"] = $_POST["guess"];
    $_SESSION["res"] = $_SESSION["game"]->makeGuess($_SESSION["guess"]);
}
