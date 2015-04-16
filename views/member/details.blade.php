<!-- ================== -->		
<!-- Member detail Page -->
<!-- ================== -->
<div class="grid-12 float-left">
	
	<!-- Box -->

	<div class="box-color-2 box-shadow">

		<!-- Title -->

		<h3 class="box-color-2-title"><span>Member</span></h3>

		<!-- Text -->

		<div class="box-color-2-text">
			
			<div id="tabs" class="htabs">
				<a toggle="#tabs-history" style="cursor:pointer;" class="navigator">History Order</a>
				<a toggle="#tabs-profile" style="cursor:pointer;" class="navigator">Profile</a>
			</div>

			<div>
				<div id="tabs-history" class="tab-content">
					@if($order->count()>0)
						@foreach ($order as $item)
						<div class="content">
							<div class="order-id">
								<h2>
									Order-ID {{prefixOrder()}}{{$item->kodeOrder}}  (
									@if($item->status==0)
									Pending
									@elseif($item->status==1)
									Konfirmasi diterima
									@elseif($item->status==2)
									Pembayaran diterima
									@elseif($item->status==3)
									Terkirim
									@elseif($item->status==4)
									Batal
									@endif
									)
								</h2>
							</div>
							<br>
							<table class="form left">
								<tr><td><div class="order-date"><b>Tanggal Order :</td></b><td> {{waktu($item->tanggalOrder)}}</div></td></tr>
								<tr><td><div class="order-total"><b>Total Order :</td></b><td> {{ jadiRupiah($item->total)}}</div></td></tr>
								<tr><td><div class="order-resi"><b>Nomor Resi :</td></b><td> 
								@if($item->noResi)
									{{ $item->noResi}}
								@else
									Belum ada nomor resi pengiriman
								@endif
								</div></td></tr>
							</table>
							<table class="form right">
								<tr>
									<td valign="top">
										<b>Detail :</b>
									</td></tr><tr>

									<td>
										<div class="order-list">
											<ul style="list-style-type: circle;">
												@foreach ($item->detailorder as $detail)
													<li>{{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku->opsi1.($detail->opsisku->opsi2 != '' ? ' / '.$detail->opsisku->opsi2:'').($detail->opsisku->opsi3 !='' ? ' / '.$detail->opsisku->opsi3:'').')':''}} - {{$detail->qty}}</li>
												@endforeach	
											</ul>
										</div>
									</td>
								</tr>
							</table>
						</div>
						<div class="order-list">
							<div class="order-action"><a href="{{URL::to('konfirmasiorder/'.$item->id)}}" class="button"><span>Konfirmasi Pembayaran</span></a></div>
						</div>
						@endforeach
						{{$order->links()}}
					@else
						<div class="content">Order masih kosong</div>
					@endif
				</div>
				<div id="tabs-profile" class="tab-content" style="display:none;">
					{{Form::open(array('url'=>'member/update','method'=>'put','class'=>'form-horizontal'))}}
						<div class="content">
							<table class="form left">
								<tr>
									<td><h1>Biodata</h1></td>
								</tr>
								<tr>
									<td>Nama</td>
									<td><input name="nama" type="text" placeholder="Nama" class="large-input" value='{{$user->nama}}'></td>
								</tr>
								<tr>
									<td>Email</td>
									<td><input name="email" type="text" placeholder="Email@Email.com" class="large-input" value='{{$user->email}}'></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td><textarea name="alamat" rows="3" class="large-input">{{$user->alamat}}</textarea></td>
								</tr>
								<tr>
									<td>Negara</td>
									<td>{{Form::select('negara',array('' => '-- Pilih Negara --') + $negara , ($user ? $user->negara :(Input::old("negara")? Input::old("negara") :"")), array('class'=>'large-input', 'required'=>'', 'id'=>'negara'))}}</td>
								</tr>
								<tr>
									<td>Provinsi</td>
									<td>{{Form::select('provinsi',array('' => '-- Pilih Provinsi --') + $provinsi , ($user ? $user->provinsi :(Input::old("provinsi")? Input::old("provinsi") :"")),array('class'=>'large-input', 'required'=>'','id'=>'provinsi'))}}</td>
								</tr>
								<tr>
									<td>Kota</td>
									<td>{{Form::select('kota',array('' => '-- Pilih Kota --') + $kota , ($user ? $user->kota :(Input::old("kota")? Input::old("kota") :"")),array('class'=>'large-input', 'required'=>'','id'=>'kota'))}}</td>
								</tr>
								<tr>
									<td>Kode Pos</td>
									<td><input name="kodepos" type="text" placeholder="Kode Pos" class="large-input" value='{{$user->kodepos}}'></td>
								</tr>
								<tr>
									<td>Telepon / HP</td>
									<td>{{Form::input('text', 'telp', $user->telp)}}</td>
								</tr>
							</table>
							<table class="form right">
								<tr>
									<td><h1>Ubah Password</h1></td>
								</tr>
								<tr>
									<td>Password Lama</td>
									<td><input type="password" name="oldpassword"  class="large-input"/></td>
								</tr>
								<tr>
									<td>Password Baru</td>
									<td><input type="password" name="password"  class="large-input"/></td>
								</tr>
								<tr>
									<td>Konfirmasi Password</td>
									<td><input type="password" name="password_confirmation"  class="large-input"/></td>
								</tr>
							</table>
						</div>
						<div class="buttons">
							<div class="left">
								<input type="submit" value="Update" class="button" />
							</div>
						</div>
					{{Form::close()}}
				</div>
			</div>

		</div>

	</div>	

</div>	