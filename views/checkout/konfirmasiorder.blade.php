@if(Session::has('success'))
<div class="success" id='message' style='display:none'>
	<p>Terima kasih, konfirmasi anda sudah terkirim.</p>					
</div>		
@endif
	
<!-- ================= -->
<!-- Confirmation Form -->
<!-- ================= -->


<div class="grid-12 float-left">
	
	<!-- Box -->

	<div class="box-color-2 box-shadow">

		<!-- Title -->

		<h3 class="box-color-2-title"><span>Member</span></h3>

		<!-- Text -->

		<div class="box-color-2-text">
		
			<div class="content">
				<table class="form" border="4">
					<thead>
						<tr>
							<th align="center" width="15%">Kode Order</th>
							<th align="center" width="20%">Tanggal Order</th>
							<th align="center" width="15%">Order</th>
							<th align="center" width="15%">Jumlah</th>
							<th align="center" width="15%">Jumlah yg belum di bayar</th>
							<th align="center" width="10%">No Resi</th>
							<th align="center" width="10%">Status</th>
						</tr>
					</thead>
					<tbody>
						<tr style="border-top:3px solid #E6E6E6">
							<td>{{prefixOrder().$order->kodeOrder}}</td>
							<td>{{waktu($order->tanggalOrder)}}</td>
							<td>
								<ul>
									@foreach ($order->detailorder as $detail)
										<li>{{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku->opsi1.($detail->opsisku->opsi2 != '' ? ' / '.$detail->opsisku->opsi2:'').($detail->opsisku->opsi3 !='' ? ' / '.$detail->opsisku->opsi3:'').')':''}} - {{$detail->qty}}</li>
									@endforeach														
								</ul>
							</td>
							<td align="center">
								{{price($order->total)}}
							</td>
							<td align="center">
								- {{($order->status==2 || $order->status==3) ? price(0) : price($order->total)}}
							</td>
							<td>
								{{$order->noResi}}
							</td>
							<td align="center">
								@if($order->status==0)
								<span class="label label-warning">Pending</span>
								@elseif($order->status==1)
								<span class="label label-important">Konfirmasi diterima</span>
								@elseif($order->status==2)
								<span class="label label-info">Pembayaran diterima</span>
								@elseif($order->status==3)
								<span class="label label-info">Terkirim</span>
								@elseif($order->status==4)
								<span class="label label-info">Batal</span>
								@endif
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			
			<div class="content">
				@if($paymentinfo!=null)	
					<h2>Paypal Payment Details</h2>
					<table class="form">
						<tr>
							<td>Payment Status<td>
							<td>{{$paymentinfo['payment_status']}}</td>
						</tr>
						<tr>
							<td>Payment Date<td>
							<td>{{$paymentinfo['payment_date']}}</td>
						</tr>
						<tr>
							<td>Address Name<td>
							<td>{{$paymentinfo['address_name']}}</td>
						</tr>
						<tr>
							<td>Payer Email<td>
							<td>{{$paymentinfo['payer_email']}}</td>
						</tr>
						<tr>
							<td>Item Name<td>
							<td>{{$paymentinfo['item_name1']}}</td>
						</tr>
						<tr>
							<td>Receiver Email<td>
							<td>{{$paymentinfo['receiver_email']}}</td>
						</tr>
						<tr>
							<td>Total Payment<td>
							<td>{{$paymentinfo['payment_gross']}} {{$paymentinfo['mc_currency']}}</td>
						</tr>
					</table>
					<p>Thank you for your order.</p>
				@endif
			</div>
			
			
			<div class="content">
				@if($order->status==1 || $order->status==0)
					{{Form::open(array('url'=> 'konfirmasiorder/'.$order->id, 'method'=>'put', 'class'=> 'form-horizontal'))}}	
						<h2>Form Konfirmasi</h2><hr>
						<table class="form">
							<tr>
								<td>Nama Pengirim<td>
								<td><input type="text" name='nama' value='{{Input::old("nama")}}' required></td>
							</tr>
							<tr>
								<td>No Rekening<td>
								<td><input type="text" name='noRekPengirim' value='{{Input::old("noRekPengirim")}}' required></td>
							</tr>
							<tr>
								<td>Rekening Tujuan<td>
								<td>
									<select name='bank'>
										<option value=''>-- Pilih Bank Tujuan --</option>
										@foreach ($banktrans as $bank)
											<option value="{{$bank->id}}">{{$bank->bankdefault->nama}} - {{$bank->noRekening}} - A/n {{$bank->atasNama}}</option>
										@endforeach
									</select>
								</td>
							</tr>
							<tr>
								<td>Jumlah<td>
								<td><input type="text" name='jumlah' value='{{price($order->total)}}' required readonly="readonly"></td>
							</tr>
							<tr>
								<td><td>
								<td><input type="submit" class="button" value="Konfirmasi Order"></td>
							</tr>
						</table>
					{{Form::close()}}
				@endif
			</div>
			<center><a href="{{url('member')}}">Kembali ke member area</a></center>
		</div>

	</div>	

</div>	




