@php
$currentYear = date('Y');
@endphp

<form class="text-white" action="" method="get">
  <div class="form-row">
    <div class="col-sm-2 form-group form-label-group">
      <input type="text" id="txtKeyword" class="form-control custom-input" placeholder="Buscar" name="txtKeyword">
      <label for="txtKeyword">Búsqueda</label>
    </div>

    <div class="col form-group form-label-group">
      <select id="optYear" class="form-control custom-select" name="optYear">
          <option value="{{ $currentYear }}">{{ $currentYear }}</option>
          @for ($i = $currentYear -1; $i >= 2009; $i--) 
            <option value="{{ $i }}">{{ $i }}</option>
          @endfor
      </select>
      <label for="optYear">Año</label>
    </div>

    <div class="col form-group form-label-group">
      <select id="optMonth" class="form-control custom-select" name="optMonth">
        <option value="">Todos</option>
        <option value="1">Enero</option>
        <option value="2">Febrero</option>
        <option value="3">Marzo</option>
        <option value="4">Abril</option>
        <option value="5">Mayo</option>
        <option value="6">Junio</option>
        <option value="7">Julio</option>
        <option value="8">Agosto</option>
        <option value="9">Setiembre</option>
        <option value="10">Octubre</option>
        <option value="11">Noviembre</option>
        <option value="12">Diciembre</option>
      </select>
      <label for="optMonth">Mes</label>
    </div>

    <div class="col form-group form-label-group">
      <select id="optPerPage" class="form-control custom-select" name="optPerPage">
          <option value="20">20</option>
          <option value="25">25</option>
          <option value="50">50</option>
          <option value="100">100</option>
      </select>
      <label for="optPerPage">Listar</label>
    </div>

    <div class="col form-group form-label-group">
      <button id="btnDocumento" type="submit" class="btn btn-secondary"><i class="fas fa-filter"></i> Buscar</button>
      <button id="btnLimpiar" type="submit" class="btn btn-light"><i class="fas fa-sync"></i> Limpiar</button>
    </div>
  </div>
</form>