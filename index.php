<?php
mb_internal_encoding("UTF-8");

function autoloadFunction($class)
{
        // Končí název třídy řetězcem "Kontroler" ?
        if (preg_match('/Controller$/', $class))
                require("app/controllers/" . $class . ".php");
        else
                require("app/models/" . $class . ".php");
}
spl_autoload_register("autoloadFunction");

require_once('app/Application.php');
$app = new Application();
$app->run();