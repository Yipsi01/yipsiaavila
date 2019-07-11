<?php

require_once "models/examendata.model.php";

/**
 *
 *
 * @return void
 */
function run()
{
    $viewData = array();
    $viewData["xcfrt"] = md5(microtime());
    $_SESSION["xcfrt"] = $viewData["xcfrt"];
    $viewData["paginas"] = obtenerListas();
    renderizar("examenlist", $viewData);
}
  run();
?>
