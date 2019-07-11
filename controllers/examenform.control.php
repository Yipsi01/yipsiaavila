<?php
  require_once "models/examendata.model.php";
  function run()
  {
      $yyam_estado = obtenerEstados();
      $selectedEst = 'ACT';
      $mode = "";
      $errores=array();
      $hasError = false;
      $modeDesc = array(
        "DSP" => "PAGINAS ",
        "INS" => "Creando Nueva Pagina",
        "UPD" => "Actualizando Pagina ",
        "DEL" => "Eliminando  Pagina"
      );
      $viewData = array();
      $viewData["showyyam_codigo"] = true;
      $viewData["showBtnConfirmar"] = true;
      $viewData["readonly"] = '';
      $viewData["selectDisable"] = '';

      if (isset($_POST["xcfrt"]) && isset($_SESSION["xcfrt"]) &&  $_SESSION["xcfrt"] !== $_POST["xcfrt"]) {
          redirectWithMessage(
              "Petición Solicitada no es Válida",
              "index.php?page=examenlist"
          );
          die();
      }
      $viewData["xcfrt"] = $_SESSION["xcfrt"];
      if (isset($_POST["btnDsp"])) {
          $mode = "DSP";
          $paginas = obtenerPaginasPorId($_POST["yyam_codigo"]);
          $selectedEst=$moda["yyam_estado"];
          $viewData["showBtnConfirmar"] = false;
          $viewData["readonly"] = 'readonly';
          $viewData["selectDisable"] = 'disabled';
          mergeFullArrayTo($paginas, $viewData);
          $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["yyam_plugin"];
      }
      if (isset($_POST["btnUpd"])) {
          $mode = "UPD";
          //Vamos A Cargar los datos
          $paginas = obtenerPaginasPorId($_POST["yyam_codigo"]);
          $selectedEst=$paginas["yyam_estado"];
          mergeFullArrayTo($paginas, $viewData);
          $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["yyam_plugin"];
      }
      if (isset($_POST["btnDel"])) {
          $mode = "DEL";
          //Vamos A Cargar los datos
          $paginas = obtenerPaginasPorId($_POST["yyam_codigo"]);
          $selectedEst=$paginas["yyam_estado"];
          $viewData["readonly"] = 'readonly';
          $viewData["selectDisable"] = 'disabled';
          mergeFullArrayTo($moda, $viewData);
          $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["yyam_plugin"];
      }




    

      if (isset($_POST["btnConfirmar"])) {
          $mode = $_POST["mode"];
          $selectedEst = $_POST["yyam_estado"];
           mergeFullArrayTo($_POST, $viewData);
          switch($mode)
          {
          case 'INS':
              if (!$hasError && agregarNuevaPaginas(
                  $viewData["yyam_plugin"],
                  $viewData["yyam_estado"],
                  $viewData["yyam_urlhomepage"],
                  $viewData["yyam_urlcdn "],
              )
              ) {
                  redirectWithMessage(
                      "Pagina Guardada Exitosamente",
                      "index.php?page=examenlist"
                  );
                  die();
              }
              break;
          case 'UPD':
              $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["yyam_plugin"];
              if (modificarPaginas(
                  $viewData["yyam_plugin"],
                  $viewData["yyam_estado"],
                  $viewData["yyam_urlhomepage"],
                  $viewData["yyam_urlcdn"],
                  $viewData["yyam_codigo"]
              )
              ) {
                  redirectWithMessage(
                      "Pagina Actualizada Exitosamente",
                      "index.php?page=examenlist"
                  );
                  die();
              }
              break;
          case 'DEL':
              $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["yyam_plugin"];
              $viewData["readonly"] = 'readonly';
              $viewData["selectDisable"] = 'disabled';
              if (eliminarPaginas(
                  $viewData["yyam_codigo"]
              )
              ) {
                  redirectWithMessage(
                      "Pagina Eliminada Exitosamente",
                      "index.php?page=examenlist"
                  );
                  die();
              }
              break;
          }
      }
      $viewData["mode"] = $mode;
      $viewData["yyam_estado"] = addSelectedCmbArray($yyam_estado, 'cod', $selectedEst);
      $viewData["hasErrors"] = $hasError;
      $viewData["errores"] = $errores;
      renderizar("examenform", $viewData);
  }
  run();
?>
