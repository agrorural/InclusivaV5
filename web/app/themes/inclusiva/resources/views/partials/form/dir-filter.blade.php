@php
$groups = get_terms( array(
  'taxonomy' => 'grupos',
  'hide_empty' => true,
  'orderby' => 'ID',
  'order' => 'ASC',
) );
@endphp

<form action="" method="post">
  <div class="form-row">
    <div class="col-sm-2 form-group form-label-group">
      <input type="text" id="txtKeyword" class="form-control custom-input" placeholder="Buscar" name="txtKeyword">
      <label for="txtKeyword">Búsqueda</label>
    </div>

    <div class="col form-group form-label-group">
      <select id="optGrupos" class="form-control custom-select" name="optPerPage">

          <option value="0">Todos</option>

          @foreach ($groups as $group)
              <option value="{{ $group->term_id }}">{{ $group->name }}</option>
          @endforeach
      </select>
      <label for="optPerPage">Listar</label>
    </div>

    <div class="col form-group form-label-group">
      <button id="btnBuscar" type="submit" class="btn btn-secondary"><i class="fas fa-filter"></i> Buscar</button>
      <button id="btnLimpiar" type="submit" class="btn btn-light"><i class="fas fa-sync"></i> Limpiar</button>
    </div>
  </div>
</form>