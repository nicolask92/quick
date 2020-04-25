@extends('layouts.app')

@section('script-head')
<script type="text/javascript" src="{{ asset('/../resources/js/autocompletar/jquery.easy-autocomplete.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('/../resources/js/autocompletar/easy-autocomplete.min.css') }}">
<link rel="stylesheet" href="{{ asset('/../resources/js/autocompletar/easy-autocomplete.themes.min.css') }}">
@endsection

@section('content')
@if(session('mensaje'))
    <div class="container">
        <div class="alert-danger alert border p-3 mt-3">
          {{session('mensaje')}}
        </div>
      </div>
@endif

@if(session('mensaje_success'))
    <div class="container">
        <div class="alert-success alert border p-3 mt-3">
          {{session('mensaje_success')}}
        </div>
      </div>
@endif
<div class="container mt-3">
<h3>RESERVAR</h3>
</div>
<div class="container mt-1 mb-3">
<form autocomplete="off" method="POST" action="{{ route('reservar.agregado') }}">
  @csrf
    <div class="row mt-3">

      <div class="col">
          <input type="date" name="fecha_c" max="3000-12-31"  min="1000-01-01" class="form-control">
      </div>

      <div class="col">
        <div class="form-group mb-3">
        <input type="text" class="form-control" name="cliente" id="cliente" placeholder="Cliente">
         </div>
      </div>

     

      <div class="col">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">Hora</span>
        </div>
        <input type="text" aria-label="Hora" maxlength="2" value="00" name="hora" placeholder="Hora" class="form-control">
        <input type="text" aria-label="Minuto" maxlength="2" value="00" name="minutos" placeholder="Minuto" class="form-control">
      </div>
    </div>
      <div class="col">
        <input type="text" class="form-control" name="pasajero" placeholder="PAX">
      </div>
    </div>
    <div class="row mt-2"> 
        <div class="col">
            <input type="text" class="form-control" name="equipaje" placeholder="Equipaje">
          </div>
          <div class="col">
            <input type="text" class="form-control" name="habitacion" placeholder="Habitacion">
          </div>
          <div class="col">
            <input type="text" class="form-control" name="vuelo" placeholder="Vuelo">
          </div>
          <div class="col">
            <input type="text" class="form-control" name="tarifa" placeholder="Tarifa">
          </div>
      </div>
      <div class="row mt-4">
        <div class="col">
            <input type="text" class="form-control" name="desde" placeholder="Origen">
          </div>
          <div class="col">
            <input type="text" class="form-control" name="hasta" placeholder="Destino">
          </div>
          <div class="col">
            
          </div>
          <div class="col">
            
          </div>
      </div>
      <div class="row mt-4">
        <div class="col">
          <input type="text" class="form-control" name="solicito" placeholder="Solicito">
        </div>
      </div>
      <div class="row mt-4">
        <div class="col">
          <input type="text" class="form-control" id="moviles" name="movil" placeholder="Movil">
        </div>
        <div class="col">
          <input type="text" class="form-control" name="tipo_v" placeholder="Tipo de Vehiculo">
        </div>
        <div class="col">
          <input type="text" class="form-control" name="vehiculo" placeholder="Vehiculo">
        </div>
      </div>
      <div class="row mt-4">
        <div class="col">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Comentarios</span>
          </div>
          <textarea class="form-control" name="comentarios" aria-label="With textarea"></textarea>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col">
        <input type="text" class="form-control" name="tipo_c" placeholder="Tipo de cobranza">
      </div>
      <div class="col">
        <input type="text" class="form-control" name="voucher" placeholder="Voucher">
      </div>
    </div>
    <button type="submit" class="mt-3 btn btn-primary">Reservar</button>
  </form>
</div>
@endsection

@section('script')

<script>

$(document).ready(function(){
  var dateControl = document.querySelector('input[type="date"]');
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = today.getFullYear();
  
  today = yyyy + '-' + mm + '-' + dd;
  dateControl.value = today;
});



var options = {

data: {
	"hotel": [
    @foreach($todos_clientes as $cliente)
    @if($cliente->tipo_cliente == "Hotel")
    {"character":"{{$cliente->cliente}}", "realName": "{{$cliente->razon_social}}"}
        
    @if(!$loop->last)  ,   @endif
    @endif

    @endforeach
	],
	"cuenta_corriente": [
    @foreach($todos_clientes as $cliente)
    @if($cliente->tipo_cliente == "Cuenta Corriente")
    {"character":"{{$cliente->cliente}}", "realName": "{{$cliente->razon_social}}"}
        
    @if(!$loop->last)  ,   @endif
    @endif

    @endforeach
    ],
    "particulares": [
      @foreach($todos_clientes as $cliente)
    @if($cliente->tipo_cliente == "Particulares")
    {"character":"{{$cliente->cliente}}", "realName": "{{$cliente->razon_social}}"}
        
    @if(!$loop->last)  ,   @endif
    @endif

    @endforeach
    ],
    "walter_daniel": [
      @foreach($todos_clientes as $cliente)
    @if($cliente->tipo_cliente == "Walter/Daniel")
    {"character":"{{$cliente->cliente}}", "realName": "{{$cliente->razon_social}}"}
        
    @if(!$loop->last)  ,   @endif
    @endif

    @endforeach]
},

categories: [{
    listLocation: "hotel",
    maxNumberOfElements: 4,
    header: "HOTELES"
}, {
    listLocation: "cuenta_corriente",
    maxNumberOfElements: 4,
    header: "CUENTA CORRIENTE"
}, {
    listLocation: "particulares",
    maxNumberOfElements: 4,
    header: "PARTICULARES"
}, {
    listLocation: "walter_daniel",
    maxNumberOfElements: 4,
    header: "WALTER / DANIEL"
}
],

getValue: function(element) {
    return element.character;
},

template: {
    type: "description",
    fields: {
        description: "realName"
    }
},

list: {
    maxNumberOfElements: 8,
    match: {
        enabled: true
    },
    sort: {
        enabled: true
    }
}
};

$("#cliente").easyAutocomplete(options);

var moviles = {
	data: [
    @foreach($moviles as $movil)
    "{{$movil->movil}}",
    @endforeach
        ]
};


$("#moviles").easyAutocomplete(moviles);


</script>



@endsection
