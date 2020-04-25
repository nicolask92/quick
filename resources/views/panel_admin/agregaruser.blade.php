@extends('layouts.app')

@section('script-head')
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- CSS TABLA AJAX REQUEST // Aun sin aplicar -->
  <link href="{{ asset('css/edicion_tabla.css') }}" rel="stylesheet">
@endsection

@section('content')

@include('layouts.mensajes')

<div class="container mt-3">
<h3>Agregar Usuario</h3>
</div>
<div class="container mt-1 mb-3">
    <form autocomplete="off" method="POST" action="{{ route('agregado') }}">
      @csrf
        <div class="row mt-3">

            <div class="col">
                <input required type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" placeholder="Nombre Completo">
            </div>
            <div class="col">
                <input required type="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Email">
            </div>

            <div class="col">
                <input required type="password" class="form-control" name="contraseña" placeholder="Contraseña">
            </div>

            <div class="col">
              <div class="form-group">
                  <select class="form-control" name="rol">
                    <option value="none" selected disabled hidden> 
                      Tipo de Usuario 
                    </option>
                    <option>Administrador</option>
                    <option>Operador</option>
                    <option>Sin asignar</option>
                  </select>
              </div>
              </div>

        </div>
        
        <button type="submit" class=" btn btn-primary">Agregar Usuario</button>
    </form>
</div>

<!-- Mostrar los usuarios y privilegios actuales -->

@include('panel_admin.users')

@endsection

@section('script')

        <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>


        <script>
                $(document).ready(function(){
                        $("#tipo_cliente").change(function(){
                          if($(this).val() === 'admin') {
                            console.log($(this));
                          }
                        });
                })
        </script>

@endsection