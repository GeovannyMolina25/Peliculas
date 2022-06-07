@extends('layouts.app')
@section('title', __('Bienvenido'))
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h5><span class="text-center fa fa-home"></span> @yield('title')</h5></div>
            <div class="card-body">
              <h5>  
            @guest
				
				{{ __('Bienvenido a') }} {{ config('app.name', 'Laravel') }} !!! </br>
				Póngase en contacto con el administrador para obtener sus credenciales de inicio de sesión o haga clic en "Login" para ir a su panel de control.
                
			@else
					Hola {{ Auth::user()->name }}, Bienvenido de nuevo a {{ config('app.name', 'Laravel') }}.
            @endif	
				</h5>
            </div>
        </div>
    </div>
</div>
</div>
@endsection