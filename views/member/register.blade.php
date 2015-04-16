<!-- Center -->	
<div class="grid-12 float-left">

	<!-- Box -->

	<div class="box-color-2 box-shadow">

		<!-- Title -->

		<h3 class="box-color-2-title"><span>Register</span></h3>

		<!-- Text -->

		<div class="box-color-2-text">
			<p>Jika anda telah memiliki akun, maka anda dapat langsung menuju <a href="{{URL::to('member')}}">halaman login</a></p>
			{{Form::open(array('url'=>'member','method'=>'post'))}}
				<div class="content">
					<table class="form">      
						<tr>
							<td><span class="required">*</span> Nama</td>
							<td>
								<input type="text" name="nama" class="large-input" required value="{{Input::old('nama')}}"/>
							</td>
						</tr>
						<tr>
							<td><span class="required">*</span> Email</td>
							<td>
								<input type="text" name="email" class="large-input" required value='{{Input::old("email")}}'/>
							</td>
						</tr>
						<tr>
							<td><span class="required">*</span> Password</td>
							<td>
								<input type="password" name="password" required class="large-input" />
							</td>
						</tr>
						<tr>
							<td><span class="required">*</span> Konfirmasi Password</td>
							<td>
								<input type="password" name="password_confirmation" required class="large-input"/>
							</td>
						</tr>
						<tr>
							<td><span class="required">*</span> Alamat</td>
							<td>
								<textarea class="large-input" name='alamat' required >{{Input::old("alamat")}}</textarea>
							</td>
						</tr>
						<tr>
							<td><span class="required">*</span> Negara</td>
							<td>
								{{Form::select('negara',array('' => '-- Pilih Negara --') + $negara, Input::old("negara"), array('required', 'name="negara" class="large-input" id="negara" data-rel="chosen" '))}}
							</td>
						</tr>
						<tr>
							<td><span class="required">*</span> Provinsi</td>
							<td>
								{{Form::select('provinsi',array('' => '-- Pilih Provinsi --') + $provinsi, Input::old("provinsi"),array('required', 'name="provinsi" class="large-input" id="provinsi" data-rel="chosen" '))}}
							</td>
						</tr>
						<tr>
							<td><span class="required">*</span> Kota</td>
							<td>
								{{Form::select('kota',array('' => '-- Pilih Kota --') + $kota, Input::old("kota"),array('required name="kota" class="large-input" id="kota" data-rel="chosen"'))}}
							</td>
						</tr>
						<tr>
							<td>Kode Pos</td>
							<td>
								<input type="text" name="kodepos" class="large-input" value='{{Input::old("kodepos")}}'/>
							</td>
						</tr>
						<tr>
							<td><span class="required">*</span> Telepon / HP</td>
							<td>
								<input type="text" name="telp" class="large-input" value='{{Input::old("telp")}}'/>
							</td>
						</tr>
						<tr>
							<td><span class="required">*</span> Captcha</td>
							<td>
								{{ HTML::image(Captcha::img(), 'Captcha image') }}
								{{Form::text('captcha')}}
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="checkbox" name='readme' id="inlineCheckbox1" value="1" required> Saya telah membaca dan menyetujui <a href="{{URL::to('service')}}">Persyaratan Member</a>
							</td>
						</tr>
					</table>
				</div>
				<div class="buttons">
					<div class="left">
						<input type="submit" value="Register" class="button" />
					</div>
				</div>
			{{Form::close()}}

		</div>

	</div>	

</div>	
<!-- End Center -->	