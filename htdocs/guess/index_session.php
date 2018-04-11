<?php
require "config.php";
require "autoload.php";


session_start();


// For the view
$title = "Guess my number (SESSION)";


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

?><!doctype html>
<meta charset="utf-8">
<title><?= $title ?></title>
<h1><?= $title ?></h1>

<p>Guess a number between 1 and 100, you have <?= $_SESSION["game"]->tries() ?> times left.</p>

<form method="POST">
    <input type="text" name="guess" value="<?= $_SESSION["guess"] ?>" autofocus>
    <input type="submit" name="doGuess" value="Make a guess">
    <input type="submit" name="doCheat" value="Cheat">
    <input type="submit" name="reset" value="Reset">
</form>

<?php if (isset($_SESSION["res"])) : ?>
<p>Your guess <?= $_SESSION["guess"] ?> is <b><?= $_SESSION["res"] ?></b></p>
<?php endif; ?>

<?php if (isset($_POST["doCheat"])) : ?>
<p>Cheat: <?= $_SESSION["game"]->number() ?></p>
<?php endif; ?>
