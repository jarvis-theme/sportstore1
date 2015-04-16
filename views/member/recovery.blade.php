@if(Session::has('errorlogin'))

    <div class="error" id='message' style='display:none'>

        <p>Maaf, email atau password anda salah.</p>

    </div>

@endif

@if(Session::has('error'))

    <div class="error" id='message' style='display:none'>

        {{Session::get('error')}}!!!

    </div>

@endif

@if(Session::has('errorrecovery'))

    <div class="error" id='message' style='display:none'>

        <p>Maaf, email anda tidak ditemukan.</p>

    </div>

@endif

@if(Session::has('forget'))

<div class="success" id='message' style='display:none'>

    <p>Cek email untuk me-reset password anda!</p>

</div>  

@endif

@if(Session::has('error'))

<div class="error" id='message' style='display:none'>

    <p>{{Session::get('error')}}</p>

</div>  

@endif

@if($errors->all())

    <div class="error" id='message' style='display:none'>

        @foreach($errors->all() as $message)

        <p>{{ $message }}</p>

        @endforeach

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
					<h2>Masukan password baru anda</h2>
					{{Form::open(array('url' => 'member/recovery/'.$id.'/'.$code, 'class' => ''))}}
					<div class="content">
						<b>Password baru</b><br />
						<input type="password" name="password" class="large-input" required/>
						<br />
						<br />
						<b>Ulangi password baru</b><br />
						<input type="password" name="password_confirmation" class="large-input"/>
						<br />
						<input type="submit" value="Reset Password" class="button" required/>
					</div>
					</form>
				</div>
			</div>
			<script type="text/javascript"><!--
			$('#login input').keydown(function(e) {
			if (e.keyCode == 13) {
			$('#login').submit();
			}
			});
			//--></script> 

		</div>

	</div>	

</div>	
<!-- End Center -->	