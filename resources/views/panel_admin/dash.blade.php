@extends('layouts.app')

@section('script-head')
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- CSS TABLA AJAX REQUEST -->
  <link href="{{ asset('css/edicion_tabla.css') }}" rel="stylesheet">
@endsection

@section('content')

@include('layouts.mensajes')



<div class="container mt-5">

<h3>AREA ADMINISTRATIVA</h3>

@include('layouts.barra_administracion')

<!-- Mostrar los usuarios y privilegios actuales -->
@include('panel_admin.users')

@endsection

@section('script')


        <script type="text/javascript">
          $(document).ready(function(){
            $(function () {
              $('[data-toggle="tooltip"]').tooltip()
            });
            var actions = $("table td:last-child").html();
            	// Add row on add button click
            $(document).on("click", ".add", function(){
                var empty = false;
                var input = $(this).parents("tr").find(':input');
                input.each(function(){
                  if(!$(this).val()){
                    $(this).addClass("error");
                    empty = true;
                  } else{
                    $(this).removeClass("error");
                  }
                });
                
                $(this).parents("tr").find(".error").first().focus();

                if(!empty){
                    input.each(function(){
                      console.log(input);
                      $(this).parent("td").html($(this).val());
                      });
                      
                    $(this).parents("tr").find(".add, .edit").toggle();
                    $(".add-new").removeAttr("disabled");
                  }
            });


            // Edit row on edit button click
              $(document).on("click", ".edit", function(){		
                  $(this).parents("tr").find("td:eq(0),td:eq(1)").each(function(){
                $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
              });
              $(this).parents("tr").find("td:eq(2)").each(function(){
                $(this).html(`
                    <select id="rol" class="form-control">
                    <option>Administrador</option>
                    <option>Operador</option>
                    <option>Sin asignar</option>
                  </select>`);
              });
              $(this).parents("tr").find(".add, .edit").toggle();
              $(".add-new").attr("disabled", "disabled");
              });
            // Delete row on delete button click
              $(document).on("click", ".delete", function(){
                  $(this).parents("tr").remove();
              $(".add-new").removeAttr("disabled");
              });
          });
      </script>



      <script>
        function AgregarUser(valorCaja1, valorCaja2){
        
                var parametros = {
                        "valorCaja1" : valorCaja1,
                        "valorCaja2" : valorCaja2
                };
                $.ajax({
                        data:  parametros,
                        url:   'gethint',
                        type:  'post',
                        beforeSend: function () {
                                $("#resultado").html("Procesando, espere por favor...");
                        },
                        success:  function (data) {
        
                            var dhtml="";
                                for (datas in data.datos) {
                                  dhtml+=' <p> Nombre: '+data.datos[datas].login+'</p>';
                                };
                            
                            $("#resultado").html(data.resultado + " "+ data.sms+" "+dhtml);
                        }
                });
        }
        </script>
  


@endsection