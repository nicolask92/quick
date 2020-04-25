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
    Complete todos los datos del formulario para agregar un Nuevo Movil
  </div>
</div>
@endif

<div class="container mt-3">
<h3>AGREGAR MOVIL</h3>
</div>
<div class="container mt-1 mb-3">
<form method="POST" action="{{ route('administracion.moviles_a') }}" autocomplete="off">
  @csrf
    <div class="row mt-3">

        <div class="col">
            <input type="text" autocomplete="off" class="form-control" maxlength="3" name="movil" placeholder="Numero de Movil">
        </div>
        <div class="col">
            <input type="text" class="form-control" name="celular" placeholder="Celular">
        </div>
        <div class="col">
          <label class="sr-only" for="inlineFormInputGroup">Marca</label>
            <div class="input-group mb-2">
              <input type="text" class="form-control" id="inlineFormInputGroup" name="marca" placeholder="Marca">
              <div class="input-group-prepend">
                <a role="button" href="#" class="btn btn-primary input-group-text">Nueva</a>
              </div>
            </div>
        </div>
        <div class="col">
          <div class="input-group mb-2">
            <input type="text" class="form-control" name="modelo" placeholder="Modelo">
            <div class="input-group-prepend">
              <a role="button" href="#" class="btn btn-primary input-group-text">Nuevo</a>
            </div>
          </div>
      </div>
        <div class="col">
            
            <div class="form-group">
                <select class="form-control" name="relacion" id="Relacion a la Empresa">
                  <option value="none" selected disabled hidden> 
                    Relacion a la Empresa 
                  </option> 
                  <option value="Propio">Propio</option>
                  <option value="Tercerizado">Tercerizado</option>
                </select>
            </div>
        </div>
    </div>
    
    <button type="submit" class=" btn btn-primary">Agregar Movil</button>
  </form>
</div>

<!-- Mostrar los clientes actuales -->

<div class="container mt-4">
  <div class="table-responsive">
    
  <table class="table table-sm table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th scope="col">Numero Movil</th>
          <th scope="col">Celular</th>
          <th scope="col">Vehiculo</th>
          <th scope="col">Modelo</th>
          <th scope="col">Relacion</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($movil_lista as $movil)
        <tr>
          <th scope="row">{{ $movil->movil }} </th>            
          <td>{{ $movil->celular }}</td>
          <td>{{ $movil->marca }}</td>
          <td>{{ $movil->modelo }}</td>
          <td>{{ $movil->relacion }}</td>
        </tr>
        <tr>
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