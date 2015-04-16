@if(Session::has('error'))
	<div class="error" id='message' style='display:none'>							
		{{Session::get('error')}}
	</div>
@endif
@if(Session::has('success'))
	<div class="success" id='message' style='display:none'>
		<p>Selamat, anda sudah berhasil register. Silakan check email untuk mengetahui informasi akun anda.</p>					
	</div>
@endif
@if(Session::has('errorrecovery'))
	<div class="error" id='message' style='display:none'>
		<p>Maaf, email anda tidak ditemukan.</p>					
	</div>
@endif	
	
<!-- Center -->	
<div class="grid-12 float-left">

	<!-- Box -->

	<div class="box-color-2 box-shadow">

		<!-- Title -->

		<h3 class="box-color-2-title"><span>Lupa Password</span></h3>

		<!-- Text -->

		<div class="box-color-2-text">
			
			{{Form::open(array('url' => 'member/forgetpassword'))}}
				<p>Masukkan e-mail anda yang telah terdaftar</p>
				<div class="content">
					<table class="form">
						<tr>
						<td>Email</td>
						<td><input type="text" name="recoveryEmail" value="" class="large-input"/></td>
						</tr>
					</table>
				</div>
				<div class="buttons">
					<div class="left">
						<input type="submit" value="Reset Password" class="button" />
					</div>
				</div>
			{{Form::close()}}

		</div>

	</div>	

</div>	
<!-- End Center -->	