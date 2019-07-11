<?php
require_once "libs/dao.php";

// Elaborar el algoritmo de los solicitado aquí.

/*SELECT `paginas`.`yyam_codigo`,
    `paginas`.`yyam_plugin`,
    `paginas`.`yyam_estado`,
    `paginas`.`yyam_urlhomepage`,
    `paginas`.`yyam_urlcdn`
FROM `yipsiavila`.`paginas`;*/

/**
 * Obtiene los registro de la tabla de modas
 *
 * @return Array
 */
function obtenerListas()
{
   $sqlstr = "select `paginas`.`yyam_codigo`,
   `paginas`.`yyam_plugin`,
   `paginas`.`yyam_estado`,
   `paginas`.`yyam_urlhomepage`,
   `paginas`.`yyam_urlcdn`
FROM `yipsiavila`.`paginas`";

   $paginas = array();
   $paginas = obtenerRegistros($sqlstr);
   return $paginas;
}

function obtenerPaginasPorId($id)
{
 $sqlstr="select `paginas`.`yyam_codigo`,
 `paginas`.`yyam_plugin`,
 `paginas`.`yyam_estado`,
 `paginas`.`yyam_urlhomepage`,
 `paginas`.`yyam_urlcdn`
FROM `yipsiavila`.`paginas`where yyam_codigo=%d";

 $paginas= array();
 $paginas=obtenerUnRegistro(sprintf($sqlstr));
 return $paginas;
}

function obtenerEstadoPorId($id)
{
 $sqlstr="select `paginas`.`yyam_estado`
       from `yipsiavila`.`paginas` where yyam_codigo=%d";
 $paginas= array();
 $paginas=obtenerUnRegistro(sprintf($sqlstr));
 return $paginas;
}


function obtenerEstados()
{
   return array(
       array("cod"=>"ACT", "dsc"=>"Activo"),
       array("cod"=>"INA", "dsc"=>"Inactivo"),
       array("cod"=>"PLN", "dsc"=>"En Planificación"),
       array("cod"=>"RET", "dsc"=>"Retirado"),
       array("cod"=>"SUS", "dsc"=>"Suspendido"),
       array("cod"=>"DES", "dsc"=>"Descontinuado")
   );
}

function agregarNuevaPaginas($yyam_plugin, $yyam_estado, $yyam_urlhomepage, $yyam_urlcdn) {
   $insSql = "INSERT INTO paginas(yyam_plugin, yyam_estado, yyam_urlhomepage,  yyam_urlcdn)
     values ('%s','%s','%s','%s');";
     if (ejecutarNonQuery(
         sprintf(
             $insSql,
             $yyam_plugin,
             $yyam_estado,
             $yyam_urlhomepage,
             $yyam_urlcdn

         )))
     {
       return getLastInserId();
     } else {
         return false;
     }
}

function modificarPaginas($yyam_plugin,  $yyam_estado,$yyam_urlhomepage,$yyam_urlcdn, $yyam_codigo)
{
   $updSQL = "UPDATE paginas set yyam_plugin='%s',
   yyam_estado='%s',  yyam_urlhomepage='%s',yyam_urlcdn='%s' where yyam_codigo=%d;";

   return ejecutarNonQuery(
       sprintf(
           $updSQL,
           $yyam_plugin,
           $yyam_estado,
           $yyam_urlhomepage,
           $yyam_urlcdn,
           $yyam_codigo
       )
   );
}
function eliminarPaginas($yyam_codigo)
{
   $delSQL = "DELETE FROM paginas where yyam_codigo=%d;";

   return ejecutarNonQuery(
       sprintf(
           $delSQL,
           $yyam_codigo
       )
   );
}
?>
