@if(Session::has('message'))
<div class="error" id='message' style='display:none'>
	<p>Maaf, kode order anda tidak ditemukan.</p>					
</div>		
@endif


<!-- =================== -->
<!-- Konfirm Order Index -->
<!-- =================== -->

<div class="grid-12 float-left">
	
	<!-- Box -->

	<div class="box-color-2 box-shadow">

		<!-- Title -->

		<h3 class="box-color-2-title"><span>Konfirmasi Order</span></h3>

		<!-- Text -->

		<div class="box-color-2-text">
			
			<div class="content">
				<p>Silakan masukkan nomor order yang mau anda cari !</p>
				{{Form::open(array('url'=>'konfirmasiorder','method'=>'post','class'=>'form-horizontal'))}}
					<table class="form">
						<tr>
							<td><input type="text" name="kodeorder" /></td>
						</tr>
						<tr>
							<td><input type="submit" value="Cari Kode" class="button" /></td>
						</tr>
					</table>
				{{Form::close()}}
			</div>

		</div>

	</div>	

</div>	