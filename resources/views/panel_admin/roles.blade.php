@extends('layouts.app')

   

<!-- Mostrar los usuarios y privilegios actuales -->

@section('content')


<div class="container mt-4">
  <div class="table-responsive">
    
  <table class="table table-sm table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Rol</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($datas as $data)
        <tr>
          <th scope="row">{{ $data->id }} </th>    
          <td>{{ $data->name }} </td>    
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
                $(document).ready(function(){
                        $("#tipo_cliente").change(function(){
                          if($(this).val() === 'admin') {
                            console.log($(this));
                          }
                        });
                })
        </script>

@endsection