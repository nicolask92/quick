
<div class="container mt-4">

        <h5>Usuarios Activos</h5>
      
        <div class="table-responsive">
          
          <table class="table table-sm table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Privilegios</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($usuarios as $usuario)
              <tr>
                <td>{{$usuario->name}} </th>    
                <td>{{$usuario->email}} </td>    
                <td>@foreach($usuario->rol as $role){{$role->name}}@endforeach
                </td>
                <td>
                 @foreach($usuario->rol as $permi)
                    @foreach($permi->permisos as $permiso)
                      {{$permiso->name}}<br>
                      @endforeach     
                 @endforeach
                </td>
                <td value="{{$usuario->id}}">
                    <a class="add" title="Agregar" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                    <a class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                    <a class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>
      </div>
      </div>