<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());
?>

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
