@extends('layouts.app')

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

@if ($errors->any())

<div class="container">
  <div class="alert-danger alert border p-3 mt-3">
    Complete todos los datos del formulario para agregar un Nuevo Cliente
  </div>
</div>
@endif

<div class="container mt-3">
<h3>AGREGAR CLIENTE</h3>
</div>
<div class="container mt-1 mb-3">
<form autocomplete="off" method="POST" action="{{ route('administracion.clientes_a') }}">
  @csrf
    <div class="row mt-3">

        <div class="col">
            <input type="text" class="form-control" name="cliente" placeholder="Cliente">
        </div>
        <div class="col">
            <input type="text" class="form-control" name="razon_social" placeholder="Razon social">
        </div>
        <div class="col">
            <input type="text" class="form-control" name="cuit" placeholder="CUIT">
        </div>

        <div class="col">
            
          <div class="form-group">
              <select class="form-control" name="tipo_cliente" id="tipo_cliente">
                <option value="none" selected disabled hidden> 
                  Tipo de Cliente 
                </option>
                <option value="Hotel">Hotel</option>
                <option value="Particulares">Particulares</option>
                <option value="Cuenta Corriente">Cuenta Corriente</option>
                <option value="Walter/Daniel">Walter / Daniel</option>
              </select>
          </div>
          </div>

        <div class="col">
            
            <div class="form-group">
                <select class="form-control" name="factura" id="exampleFormControlSelect2">
                  <option value="none" selected disabled hidden> 
                    Tipo de Factura 
                  </option>
                  <option value="A">Factura A</option>
                  <option value="B">Factura B</option>
                  <option value="C">Factura C</option>
                </select>
            </div>
        </div>
    </div>
    
    <button type="submit" class=" btn btn-primary">Agregar Cliente</button>
  </form>
</div>

<!-- Mostrar los clientes actuales -->

<div class="container mt-4">
  <div class="table-responsive">
    
  <table class="table table-sm table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th scope="col">Cliente</th>
          <th scope="col">Tipo de Cliente</th>
          <th scope="col">Razon Social/Nombre</th>
          <th scope="col">CUIT</th>
          <th scope="col">Tipo de Factura</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($clientes as $cliente)
        <tr>
          <th scope="row">{{ $cliente->cliente }} </th>    
          <td>{{ $cliente->tipo_cliente }} </td>    
          <td>{{ $cliente->razon_social }}</td>
          <td>{{ $cliente->cuit }}</td>
          <td>{{ $cliente->tipo_f }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>
</div>

@endsection

@section('script')

        <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>


        <script>

        </script>

@endsection