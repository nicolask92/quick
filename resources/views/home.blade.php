@extends('layouts.app')

@section('script-head')

@endsection

@section('content')


@include('datos')


@endsection

@section('script')


<script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
<script src="https://unpkg.com/tableexport.jquery.plugin/libs/jsPDF/jspdf.min.js"></script>
<script src="https://unpkg.com/tableexport.jquery.plugin/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.15.5/dist/extensions/export/bootstrap-table-export.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.15.5/extensions/filter-control/bootstrap-table-filter-control.js" integrity="sha256-IZVGzH3kvhc7Z+TfYCzMEKE2cPEric3T47fBXS5gIKU=" crossorigin="anonymous"></script>


<script src="{{ asset('/../resources/js/es-AR.js') }}"></script>


<script>
  var $table = $('#table')
  var $button = $('#button')

  $(function() {
    var data = [

      @foreach ($reservas as $reserva)
      {
        'fecha': `{{ date('d-m-y', strtotime($reserva->fecha_hora_traslado)) }}`,
        'hora': `{{ date('H:i',strtotime($reserva->fecha_hora_traslado)) }}`,
        'cliente': `{{ $reserva->cliente }}`,
        'pasajero': `{{ $reserva->pasajero }}`,
        'desde': `{{ $reserva->desde }}`,
        'hasta': `{{ $reserva->hasta }}`,
        'vuelo': `{{ $reserva->vuelo }}`,
        'tipo': `{{ $reserva->tipo_v }}`,
        'vehiculo': `{{ $reserva->vehiculo }}`,
        'movil': `{{ $reserva->movil }}`,
        'voucher': `{{ $reserva->voucher }}`
      },
      @endforeach
      
    ]
    $table.bootstrapTable({
      pagination: true,
      data: data,
      exportTypes: ['csv', 'txt', 'excel', 'pdf'],
      locale:'es-AR'
      })
  });


</script>

<script>

var dateControl = document.querySelector('input[type="date"]');
var dateControl2 = document.querySelector('#app > div:nth-child(2) > input');
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = yyyy + '-' + mm + '-' + dd;
dateControl.value = today;
dateControl2.value = today;

</script>

<!-- Estilos Via JS -->
<script type="application/javascript">
  $(document).ready(function(){
          $("#app > div:nth-child(1) > div > div:nth-child(1) > input").addClass("form-control");
          $("#app > div:nth-child(2) > div > div:nth-child(1) > input").addClass("form-control");
          $("#app > div:nth-child(3) > div.table-responsive > div.bootstrap-table.bootstrap4 > div.fixed-table-toolbar > div.float-right.search.btn-group").removeClass("float-right");
          $("#app > div:nth-child(3) > div.table-responsive > div.bootstrap-table.bootstrap4 > div.fixed-table-toolbar > div.float-right.search.btn-group").addClass("float-left");
          $("#table > tbody").css("font-size", "0.8em");
          $("#table > thead > tr > th:nth-child(1)").css("width", "8%");
          $("#table").css("background-color","white");
      });
  
  
  </script>


@endsection
