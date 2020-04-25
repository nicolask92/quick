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
  <div class="alert-danger alert border mt-3">
    <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
</div>
@endif