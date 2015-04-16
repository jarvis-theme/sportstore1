<!-- ==================== -->
<!-- Testimonial template -->
<!-- ==================== -->

<div class="grid-12 float-left">

	<!-- Box -->

	<div class="box-color-2 box-shadow">

	<!-- Title -->

		<h3 class="box-color-2-title"><span>Testimonial</span></h3>

	<!-- Text -->

		<div class="box-color-2-text">
			@foreach($testimonial as $key=>$value)
				<h2>{{$value->nama}}</h2>
				<div class="content">
					<strong>{{date("d M Y", strtotime($value->updated_at))}}</strong>
					<p>{{substr($value->isi,0,250)}}</p>
				</div>
			@endforeach
		</div>

	</div>	

</div>	