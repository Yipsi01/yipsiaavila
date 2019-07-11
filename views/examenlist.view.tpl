<section>
  <header>
    <h1>Lista de Paginas</h1>
  </header>
  <main>
    <table class="full-width">
      <thead>
        <tr>
          <th>Cod</th>
          <th>Paginas</th>
          <th>Estado</th>
          <th>URL</th>
          <th>CDN</th>
          <th class="right">
            <form action="index.php?page=examenform" method="post">
            <input type="hidden" name="yyam_codigo" value="" />
            <input type="hidden" name="xcfrt" value="{{~xcfrt}}" />
            <button type="submit" name="btnIns">Agregar</button>
          </form>
          </th>
        </tr>
      </thead>
      <tbody class="zebra">
        {{foreach paginas}}
        <tr>
          <td>{{yyam_codigo}}</td>
          <td>{{yyam_plugin}}</td>
          <td>{{estadojuguete}}</td>
          <td>{{yyam_urlhomepage}}</td>
          <td>{{yyam_urlcdn}}</td>
          <td class="right">
            <form action="index.php?page=examenform" method="post">
              <input type="hidden" name="yyam_codigo" value="{{yyam_codigo}}"/>
              <input type="hidden" name="xcfrt" value="{{~xcfrt}}" />
              <button type="submit" name="btnDsp">Ver</button>
              <button type="submit" name="btnUpd">Editar</button>
              <button type="submit" name="btnDel">Eliminar</button>
            </form>
          </td>
        </tr>
        {{endfor paginas}}
      </tbody>
      <tfoot>
        <tr>
          <td colspan="6"> Paginación</td>
        </tr>
      </tfoot>
    </table>
  </main>
</section>
