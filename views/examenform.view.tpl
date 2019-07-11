<h1>{{modeDsc}}</h1>
<section class="row">
<form action="index.php?page=examenform" method="post" class="col-8 col-offset-2">
  {{if hasErrors}}
    <section class="row">
      <ul class="error">
        {{foreach errores}}
          <li>{{this}}</li>
        {{endfor errores}}
      </ul>
    </section>
  {{endif hasErrors}}
  <input type="hidden" name="mode" value="{{mode}}"/>
  <input type="hidden" name="xcfrt" value="{{xcfrt}}" />
  <input type="hidden" name="btnConfirmar" value="Confirmar" />
  {{if showIdPaginas}}
  <fieldset class="row">
    <label class="col-5" for="yyam_codigo">Código de Pagina</label>
    <input type="text" name="yyam_codigo" id="yyam_codigo" readonly value="{{yyam_codigo}}" class="col-7" />
  </fieldset>
  {{endif showIdPaginas}}
  <fieldset class="row">
    <label class="col-5" for="yyam_plugin">Nombre: </label>
    <input type="text" name="yyam_plugin" id="yyam_plugin" {{readonly}} value="{{yyam_plugin}}" class="col-7" />
  </fieldset>

  <fieldset class="row">
    <label class="col-5" for="yyam_estado">Estado</label>
    <select name="yyam_estado" id="yyam_estado" class="col-7" {{selectDisable}} {{readonly}} >
      {{foreach yyam_estado}}
        <option value="{{cod}}" {{selected}}>{{dsc}}</option>
      {{endfor yyam_estado}}
    </select>
  </fieldset>

  <fieldset class="row">
    <label class="col-5" for="yyam_urlhomepage">URL: </label>
    <input type="text" name="yyam_urlhomepage" id="yyam_urlhomepage" {{readonly}} value="{{yyam_urlhomepage}}" class="col-7" />
  </fieldset>

  <fieldset class="row">
    <label class="col-5" for="yyam_urlcdn">CDN: </label>
    <input type="text" name="yyam_urlcdn" id="yyam_urlcdn" {{readonly}} value="{{yyam_urlcdne}}" class="col-7" />
  </fieldset>



  <fieldset class="row">
    <div class="right">
      {{if showBtnConfirmar}}
      <button type="button" id="btnConfirmar" >Confirmar</button>
      &nbsp;
      {{endif showBtnConfirmar}}
      <button type="button" id="btnCancelar">Cancelar</button>
    </div>
  </fieldset>

  
</form>
</section>
<script>
  $().ready(function(){
    $("#btnCancelar").click(function(e){
      e.preventDefault();
      e.stopPropagation();
      location.assign("index.php?page=examenlist");
    });
    $("#btnConfirmar").click(function(e){
      e.preventDefault();
      e.stopPropagation();
      /*Aqui deberia hacer validación de datos*/
      document.forms[0].submit();
    });
  });
</script>
