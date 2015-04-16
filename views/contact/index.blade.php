<!-- ============ -->
<!-- Contact page -->
<!-- ============ -->

<div class="grid-12 float-left">

	<!-- Box -->

	<div class="box-color-2 box-shadow">

	<!-- Title -->

		<h3 class="box-color-2-title"><span>Contact us</span></h3>

	<!-- Text -->

		<div class="box-color-2-text">
			<div class="content">
				@if($kontak->lat!='0' || $kontak->lng!='0')
					
					<iframe width="900" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=-8.617784,115.222045&amp;aq=&amp;sll={{$kontak->lat}},{{$kontak->lng}}&amp;sspn=0.061695,0.097332&amp;ie=UTF8&amp;t=m&amp;z=15&amp;output=embed"></iframe><br />
					<div class="googlemap" id="googlemap1" data-center="{{ $kontak->alamat }}" data-zoom="12"></div>
				@endif
				<table class="form left">
					<tr>
						<td><strong>{{$kontak->alamat}}</strong></td>
					</tr>
					<tr>
						<td><strong>{{$kontak->telepon}}</strong></td>
					</tr>
					<tr>
						<td><strong>{{$kontak->email}}</strong></td>
					</tr>
				</table>
				<form class="form-horizontal" action="{{URL::to('kontak')}}" method="post">
					<table class="form right">
						<tr>
							<td>Nama</td>
							<td><input type="text" class="large-input" name="namaKontak" placeholder="Nama" required/></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="text" class="large-input" name="emailKontak" placeholder="Email" required/></td>
						</tr>
						<tr>
							<td>Pesan</td>
							<td><textarea name="messageKontak" placeholder="Pesan" class="large-input" row="4" required></textarea></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" value="Kirim pesan" class="button" /></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>	
</div>