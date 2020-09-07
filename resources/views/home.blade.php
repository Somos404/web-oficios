@extends('layout')
@section('title', 'Inicio')

@section('content')
@if (session()->has('message'))
	<div class="alert alert-{{ session('typealert') }}">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		{!! session('message') !!}
	</div>
@endif

 <!-- Page Header -->
	<div class="overlay"></div>
	
    <div class="containter container-principal">
	<img src="" class="img-fluid" alt="Responsive image">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1></h1>
           
          </div>
        </div>
      </div>
    </div>

<section class="py-3">
	<div class="container text-center">
		<h2 class="my-4"> ¿Qué estás buscando?</h2>
        <div class="row mb-5">
			<div class="col-md-4">
				<form action="/buscar" method="POST">
					
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<label for="categoria">Seleccioná un servicio</label>
					<select class="browser-default custom-select" name="rubro_id">
						<option value="" disabled>Seleccionar</option>
						@foreach ($listaoficio as $lista)
							<option value="{{$lista['Oficio']->id }}">{{$lista['Oficio']->nombre }}</option>
						@endforeach
					</select>
			</div>
			<div class="col-md-4">
						<label for="localidad">Seleccioná una localidad</label>
						<select class="browser-default custom-select" name="localidad_id" placeholder="Localidades">
							<option value="" disabled>Seleccionar</option>
							@foreach ($localidades as $localidad)
							<option value="{{ $localidad->id }}">{{ $localidad->nombre }}</option>
						@endforeach
						</select>
			</div>
			<div class="col-md-4">			
						<button class="btn btn-own btn-default btn-buscar" type="submit">Buscar</button>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 centrar">
				<h2>Servicios</h2>
				<div class="table-wrapper-scroll-y my-custom-scrollbar">
					<table  class="table table-hover">
						<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col" style="text-align: left;
							margin-left: 19%;">Nombre</th>
							<th scope="col">Ver más</th>
						</tr>
						</thead>
						<tbody>
						@foreach ($prestadores as $prestador)
							<tr>
								<th scope="row">{{ $loop->iteration }}</th>
								<td class="td-nya">{{ $prestador->nombre}} {{ $prestador->apellido}}</td>
								<td><a href="/profesional/{{ $prestador->id }}"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-md-6 mt-5">
				<div id="mapa"> </div> 
			</div>
		</div>
	</div>
</section>
			
<!-- nuevo -->

<section class="shop-banner mb-5">
	<div class="container">
		<div class="sale-percent">Sumate a nuestra 
			<br> Red de prestadores
		</div>
		<p class="text-inscrip my-4">
			La promoción de tus servicios es fundamental para la gestión de futuros trabajos.
			Contanos dónde y cómo trabajás para que podamos acompañarte en tu vida laboral 
			 con espacios de <strong> promoción y comercialización. </strong> <br>
			Accedé a más contrataciones de acuerdo a tu especialidad y tu ubicación.
     		¡Conseguí nuevos clientes y aumentá tus ingresos!</p>
		<a href="/inscripcion" class="btn btn-own cart-btn btn-lg">Quiero ser parte</a>
	</div>
</section>
			
<!-- nuevo -->

	{{-- Formulario oculto que se ejecuta al hacer click en "Salir" 
					* Redirige a la ruta /logout con el método POST, ahí el controlador
					  del logout borra los datos de sesión 
					* Rediirige a la ruta /home con la sesión cerrada
				--}}
<form id="form-post" action="/logout" method="POST" style="display: none;">
	@csrf
</form>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuX4NPHQOStt_DHvGVDbkbAWfL8XiG01s&callback"
  type="text/javascript"></script>
<script type="text/javascript">
	
	//const profesionales = @json($profesionales);

	var mapa = new google.maps.Map(document.getElementById('mapa'),{
		center: {lat: -27.450977, lng: -58.986980}, 
		scrollwheel: false,
	    zoom: 15,
	    zoomControl: true,
	    rotateControl : false,
	    mapTypeControl: true,
	    streetViewControl: false,
	})

	const geocoder = new google.maps.Geocoder();

	/* profesionales.map(profesional => {
		var direccion = profesional.direccion;
		var localidad = profesional.localidad;
		const address = direccion + ' ' + localidad + ' ' + 'chaco argentina';

		console.log(address)
		const marker = new google.maps.Marker();

		geocoder.geocode({'address': address}, function(results, status){
			if(status == 'OK')
			{
				marker.setPosition(results[0].geometry.location)
				marker.setMap(mapa)
			}else{
				console.log('Ocurrio un error')
			}
		})
		
	}) */


</script>
@endsection
