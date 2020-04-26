@if(session('mensaje'))
    <div class="container">
        <div class="alert-success alert border p-3 mt-2">
          {{session('mensaje')}}
        </div>
      </div>
@endif

<div class="container ">

  <div id="bootstrap-iso form" class="container pt-4 pb-2">

    <form autocomplete="off" method="GET" action="{{ route('indexbusqueda', ['fecha_c' => 'fecha_C', 'fecha_f' => 'fecha_f']) }}">
        <div class="row" id="app">

              <div class="col-sm-3">
                <input type="date" name="fecha_c" max="3000-12-31"  min="1000-01-01" class="form-control">
                <small class="form-text text-muted text-center">
                  COMIENZO
                </small>
              </div>
              <div class="col-sm-3">
                <input type="date" name="fecha_f" max="3000-12-31"  min="1000-01-01" class="form-control">
                <small class="form-text text-muted text-center">
                  FIN
                </small>
              </div>
              <div class="col-sm-2">
                <button type="submit" class="btn btn-primary">Buscar</button>
              </div>
        </div>
      </form>

</div>

    <div class="table-responsive">
      
    <table class="table table-sm table-bordered table-hover" cellspacing="0" width="100%"
    id="table"
    data-click-to-select="true"
    data-toolbar="#toolbar"
    data-show-export="true"
    data-filter-control="true"
    data-search="true"
    data-click-to-select="true">
        <thead>
          <tr>
            <th class="align-top" data-sortable="true" data-field="fecha" scope="col">FECHA</th>
            <th class="align-top" data-sortable="true" data-field="hora" scope="col">HORA</th>
            <th class="align-top" data-sortable="true" data-field="cliente" data-filter-control="select" scope="col">CLIENTE</th>
            <th class="align-top" data-field="pasajero" data-filter-control="input" scope="col">PAX</th>
            <th class="align-top" data-field="desde" scope="col">DESDE</th>
            <th class="align-top" data-field="hasta" scope="col">HASTA</th>
            <th class="align-top" data-field="vuelo" scope="col">VUELO</th>
            <th class="align-top" data-field="tipo" scope="col">TIPO V</th>
            <th class="align-top" data-field="vehiculo" scope="col">VEHICULO</th>
            <th class="align-top" data-field="movil" data-filter-control="select" scope="col">MOVIL</th>
            <th class="align-top" data-field="voucher" scope="col">VOUCHER</th>
          </tr>
        </thead>
      </table>
</div>
</div>
