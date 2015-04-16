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

		<h3 class="box-color-2-title"><span>Login</span></h3>

		<!-- Text -->

		<div class="box-color-2-text">

			<div class="login-content">
				<div class="left">
					<h2>Pelanggan Baru</h2>
					<div class="content">
					<p><b>Segeralah mendaftar</b></p>
					<p>Dengan mendaftar, anda dapat berbelanja dengan lebih cepat!! ayo!!</p>
					<a href="{{URL::to('member/create')}}" class="button"><span>Register</span></a></div>
				</div>
				<div class="right">
					<h2>Pelanggan Lama</h2>
					<form action="{{URL::to('member/login')}}" method="post" enctype="multipart/form-data">
					<div class="content">
						<b>Email</b><br />
						<input type="text" name="email" class="large-input"/>
						<br />
						<br />
						<b>Password</b><br />
						<input type="password" name="password" class="large-input"/>
						<br />
						<a href="{{URL::to('member/forget-password')}}">Lupa Password?</a><br />
						<br />
						<input type="submit" value="Login" class="button" />
					</div>
					</form>
				</div>
			</div>

		</div>

	</div>	

</div>	
  <!-- End Center -->	