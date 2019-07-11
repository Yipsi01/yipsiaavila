<?php
/**
 * PHP Version 5
 * Application Router
 *
 * @category Router
 * @package  Router
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  Comercial http://
 *
 * @version 1.0.0
 *
 * @link http://url.com
 */
session_start();

require_once "libs/utilities.php";

$pageRequest = "home";

if (isset($_GET["page"])) {
    $pageRequest = $_GET["page"];
}



require_once "controllers/mw/verificar.mw.php";
require_once "controllers/mw/site.mw.php";



    //Este switch se encarga de todo el enrutamiento público
switch ($pageRequest) {
    //Accesos Publicos
case "home":
    //llamar al controlador
    include_once "controllers/home.control.php";
    die();
case "examenlist":
    include_once "controllers/examenlist.control.php";
    die();
case "examenform":
    include_once "controllers/examenform.control.php";
    die();
}

addToContext("pageRequest", $pageRequest);

require_once "controllers/error.control.php";
