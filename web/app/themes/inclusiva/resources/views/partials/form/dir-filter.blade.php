@php
$groups = get_terms( array(
  'taxonomy' => 'grupos',
  'hide_empty' => true,
  'orderby' => 'ID',
  'order' => 'ASC',
) );
@endphp

<form id="dirSearch" action="" method="post">
  {{-- <div class="filterSearch">
      <div class="earch">
        <div class="form-group">
          <label for="txtKeyword">Búsqueda por área</label>
          <input type="text" id="txtKeyword" class="form-control custom-input" placeholder="Buscar" name="txtKeyword">
        </div>
      </div>

    <div class="col form-group">
      <label for="optPerPage">Listar</label>
      <select id="optGrupos" class="form-control custom-select" name="optPerPage">

          <option value="0">Todos</option>

          @foreach ($groups as $group)
              <option value="{{ $group->term_id }}">{{ $group->name }}</option>
          @endforeach
      </select>
    </div>

    <div class="col form-group">
      <button id="btnBuscar" type="submit" class="btn btn-secondary"><i class="fas fa-filter"></i> Buscar</button>
      <button id="btnLimpiar" type="submit" class="btn btn-light"><i class="fas fa-sync"></i> Limpiar</button>
    </div>
  </div> --}}

  <div class="input-group">
      <input type="text" id="txtKeyword" class="form-control" placeholder="Buscar por área" name="txtKeyword">
      {{-- <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)"> --}}
      <div class="input-group-append">
        <button id="btnBuscar" type="submit" class="btn btn-contrast"><i class="fas fa-filter"></i></button>
        <button id="btnLimpiar" type="submit" class="btn btn-light"><i class="fas fa-sync"></i> Limpiar</button>
      </div>
    </div>
</form>