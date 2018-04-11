<?php
/**
 * Guess gamespecific routes.
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Guess my number with SESSION.
 */
$app->router->any(["GET", "POST"], "gissa/session", function () use ($app) {
    include __DIR__ . "/../../htdocs/guess/index_session_inside.php";

    $data = [
        "title" => "Gissa mitt nummer SESSION",
        "game" => $_SESSION["game"],
        "number" => $_SESSION["number"],
        "tries" => $_SESSION["tries"],
        "guess" => $_SESSION["guess"]
    ];

    $app->view->add("guess/session", $data);
    $app->page->render($data);
});



/**
* Showing message Hello World, rendered within the page layout.
 */
$app->router->get("lek/hello-world-wrap", function () use ($app) {
    $data = [
        "title" => "Show hello world within page layout | oophp",
        "class" => "hello-world",
        "content" => "Hello World",
    ];

    $app->view->add("content/oophp/default", $data);

    $app->page->render($data);
});
