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
	<section id="hero-container">
		<div id="hero-background"></div>
		<div id="hero-content" class="container h-100">
			<div class="row no-gutters h-100 d-flex">
				<div id="hero-text"class="col-md-6 text-light align-self-center">
					<h1 class="display-1  mb-4">RED DE OFICIOS</h1>
					<p class="lead mb-5">¿Te gustaría Ofrecer o Contratar un oficio?</p>
					<a href="#oferta" id="boton1" class="btn hvr-sweep-to-right" style="border: 1px solid  #e48f27!important;">Ofrecer</a>
					<a href="#demanda" id="boton2" class="btn  hvr-sweep-to-right" style="border: 1px solid  #e48f27!important;">Contratar</a>
				</div>
				<div class="col-md-6">
					
							 <!--Slider -->
							<div class="swiper-container">
								<div class="swiper-wrapper">
									
								<div class="swiper-slide rounded shadow" style="background-image: url(/img/electricidad.png);">
									<h2 class="titulo-card" >Electricidad</h2>
									<h3 class="nombre-card">Roberto Díaz</h3>
								</div>
								<div class="swiper-slide rounded shadow" style="background-image: url(/img/cuidadora.png);">
									<h2 class="titulo-card" >Cuidado de personas</h2>
									<h3 class="nombre-card">Belén Perez</h3>
								</div>
								<div class="swiper-slide rounded shadow" style="background-image: url(/img/albanileria.png);">
									<h2 class="titulo-card" >Albañilería</h2>
									<h3 class="nombre-card">Pablo Ruíz</h3>
								</div>
								<div class="swiper-slide rounded shadow" style="background-image: url(/img/electronica.png);">
									<h2 class="titulo-card" >Electrónica</h2>
									<h3 class="nombre-card">Gonzalo Baéz</h3>
								</div>
								<div class="swiper-slide rounded shadow" style="background-image: url(/img/tapiceria.png);">
									<h2 class="titulo-card" >Tapicería</h2>
									<div class="text-center">
										<h3 class="nombre-card">Diana Ortiz</h3>
									</div>
								</div>
								<div class="swiper-slide rounded shadow" style="background-image: url(/img/mecanica.png);">
									<h2 class="titulo-card" >Mecánica de autos</h2>
									<h3 class="nombre-card">Franco Lopez</h3>
								</div>
								<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

							
				</div>
			</div>
		</div>
	</section>


	<script>
		window.onload = function() {
			setTimeout(function() {
				document.getElementById('hero-background').style.width = '100%';
			})
		}
	</script>

 <!-- Inicio slider -->
 <script>
    var swiper = new Swiper ('.swiper-container', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
      },
	  
      pagination: {
        el: '.swiper-pagination',
      },
	  autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
    });
  </script>


<section class="py-3" id="filter">
	<div class="filter-bar justify-content-center d-flex row">
		<div class="col-md-10 filter-bar-row">
			<div class="row filter-container">
				<div class="col-md-4">
					<input class="nya-filter" type="text" placeholder="Nombre y apellido">
				</div>
				<div class="col-md-2">
					<select class="browser-default custom-select" name="localidad_id" placeholder="Localidades">
						<option value="" disabled>Seleccionar</option>
						@foreach ($localidades as $localidad)
						<option value="{{ $localidad->id }}">{{ $localidad->nombre }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-2">
					<select class="browser-default custom-select" name="rubro_id">
						<option value="" disabled>Seleccionar</option>
						@foreach ($listaoficio as $lista)
							<option value="{{$lista['Oficio']->id }}">{{$lista['Oficio']->nombre }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-2">
					<select class="browser-default custom-select" name="">
						<option value="" disabled>Seleccionar</option>
						<option value="">Esp 1</option>
						<option value="">Esp 2</option>
						<option value="">Esp 3</option>
					</select>
				</div>
				<div class="col-md-2">
					<button class="search-btn" type="submit">Buscar</button>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-6 cards">
				<!--Carousel Wrapper-->
<div id="carousel-with-lb" class="carousel slide carousel-multi-item" data-ride="carousel">

	<!--Controls-->
	{{-- <div class="controls-top">
	  <a class="btn-floating btn-secondary" href="#carousel-with-lb" data-slide="prev"><i
		  class="fa fa-chevron-left"></i></a>
	  <a class="btn-floating btn-secondary" href="#carousel-with-lb" data-slide="next"><i
		  class="fa fa-chevron-right"></i></a>
	</div> --}}
	<!--/.Controls-->
  
	<!--Indicators-->
	<ol class="carousel-indicators">
	  <li data-target="#carousel-with-lb" data-slide-to="0" class="active secondary-color"></li>
	  <li data-target="#carousel-with-lb" data-slide-to="1" class="secondary-color"></li>
	  <li data-target="#carousel-with-lb" data-slide-to="2" class="secondary-color"></li>
	</ol>
	<!--/.Indicators-->
  
	<!--Slides and lightbox-->
  
	<div class="carousel-inner mdb-lightbox" role="listbox">
	  <div id="mdb-lightbox-ui"></div>
	  <!--First slide-->
	  <div class=" carousel-item active text-center">
		
		@for ($i = 1; $i <=6; $i++)
    
			<figure class="col-md-4 d-md-inline-block">
				<div class="imagen-card-filter rounded-top">
					<a href="https://image.freepik.com/foto-gratis/trabajo-tecnico-electrico_1426-1355.jpg"
						data-size="1600x1067">
						<img src="https://image.freepik.com/foto-gratis/trabajo-tecnico-electrico_1426-1355.jpg"
						class="img-fluid rounded">
					</a>
				</div>
				<div class="desc-card-filter rounded-bottom text-left">
					<h5 class="m-0 name-card">Carlos Rodriguez</h5>
					<p class="m-0 desc-card"><i class="fa fa-user icon-card-filter" aria-hidden="true"></i> Electricista</p>
					<p class="m-0 desc-card"><i class="fa fa-map-marker icon-card-filter" aria-hidden="true"></i> Resistencia</p>
				</div>
			</figure>
		@endfor
  
	  </div>
	  <!--/.First slide-->
  
	  <!--Second slide-->
	  <div class="carousel-item text-center">
		@for ($i = 1; $i <=6; $i++)
		<figure class="col-md-4 d-md-inline-block">
			<div class="imagen-card-filter rounded-top">
				<a href="https://image.freepik.com/foto-gratis/cerca-mano-reparador-constructor-profesional-trabajando-interiores-reparando_155003-7266.jpg"
					data-size="1600x1067">
					<img src="https://image.freepik.com/foto-gratis/cerca-mano-reparador-constructor-profesional-trabajando-interiores-reparando_155003-7266.jpg"
					class="img-fluid rounded">
				</a>
			</div>
			<div class="desc-card-filter rounded-bottom text-left">
				<h5 class="m-0 name-card">José Gonzalez</h5>
				<p class="m-0 desc-card"><i class="fa fa-user icon-card-filter" aria-hidden="true"></i> Electricista</p>
				<p class="m-0 desc-card"><i class="fa fa-map-marker icon-card-filter" aria-hidden="true"></i> Resistencia</p>
			</div>
		</figure>
		@endfor
		
	  </div>
	  <!--/.Second slide-->
  
	  <!--Third slide-->
	  <div class="carousel-item text-center">
		@for ($i = 1; $i <=6; $i++)
		<figure class="col-md-4 d-md-inline-block">
			<div class="imagen-card-filter rounded-top">
				<a href="https://image.freepik.com/foto-gratis/primer-plano-manos-apoyo_53876-30583.jpg"
					data-size="1600x1067">
					<img src="https://image.freepik.com/foto-gratis/primer-plano-manos-apoyo_53876-30583.jpg"
					class="img-fluid rounded">
				</a>
			</div>
			<div class="desc-card-filter rounded-bottom text-left">
				<h5 class="m-0 name-card">María Fernandez</h5>
				<p class="m-0 desc-card"><i class="fa fa-user icon-card-filter" aria-hidden="true"></i> Electricista</p>
				<p class="m-0 desc-card"><i class="fa fa-map-marker icon-card-filter" aria-hidden="true"></i> Resistencia</p>
			</div>
		</figure>
		@endfor
  
	  </div>
	  <!--/.Third slide-->
  
	</div>
	<!--/.Slides-->
  
  </div>
  <!--/.Carousel Wrapper-->
			</div>
			<div class="col-md-6 map">
				<div id="mapa"> </div> 
			</div>
		</div>
	</div>
</section>
			
<!-- nuevo -->

<section class="shop-banner mb-5">
	<div class="container" id="oferta">
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
