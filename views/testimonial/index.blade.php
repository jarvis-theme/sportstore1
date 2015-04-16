@if(Session::has('msg1'))
<div class="success" id='message' style='display:none'>
	<p>Terima kasih, Testimonial anda sudah terkirim.</p>
</div>
@endif
@if(Session::has('msg2'))
<div class="success" id='message' style='display:none'>
	<p>404</p>
</div>
@endif

<!-- Center -->	

<!-- ============ -->
<!-- Testimonial  -->
<!-- ============= -->	
<div class="grid-8 float-left">

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

<!-- =============== -->
<!-- END Testimonial -->
<!-- =============== -->	


<!-- ================ -->
<!-- form Testimonial -->
<!-- ================ -->	

<div class="grid-4 float-left">

	<!-- Box -->

	<div class="box-color-3 box-shadow">

	<!-- Title -->

		<h3 class="box-color-3-title"><span>Buat Testimonial</span></h3>

	<!-- Text -->

		<div class="box-color-3-text">
			<i>{{Session::get('message')}}</i>
			<div class="content">
				<form class="form-horizontal" action="{{URL::to('testimoni')}}" method="post">
					<table class="form">      
						<tr>
							<td>Nama</td>
							<td>
								<input type="text" name="nama" required style="width:100%" />
							</td>
						</tr>
						<tr>
							<td>Testimonial</td>
							<td>
								<textarea name="testimonial" rows="5" cols="22" required style="width:100%"></textarea>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="submit" value="Kirim Testimonial" class="button" />
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>

	</div>	

</div>


<!-- ==================== -->
<!-- END form Testimonial -->
<!-- ==================== -->	
