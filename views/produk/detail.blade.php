<span style="margin-left: 20px;margin-top: -37px;position: absolute;left:0;">{{breadcrumbProduk(null,'; <span> > </span>',';', false, $produk->kategori)}}</span>
<!-- =================== -->
<!-- Product Description -->
<!-- =================== -->
<!-- =================== -->
<!-- Left column section -->
<!-- =================== -->
<ul class="breadcrumb" style="display:none;">
	{{$breadcrumb}};
</ul>
<!-- Categories section -->
<div class="grid-3 float-left">
	<div class="box-color-3 box-shadow">
		<!-- Title -->
		<h3 class="box-color-3-title"><span>Kategori</span></h3>
		<!-- Text -->
		<div class="box-color-3-text">
			<div class="box-category">
				<ul>
					<?php $parent = 0;?>
					@foreach ($kategori as $kat)
					@if($kat->parent=='0')
					<?php $parent++;?>
					<li class="parentcat">
						<a @foreach($kategori as $bug)
						@if ($bug->parent==$kat->id)
						class="expand toc_collapsed"
						@endif
						@endforeach
						style="cursor:default; display:run-in; padding-right:7px;float:left;width: 8px;">
					</a>
					<a href="{{slugKategori($kat)}}" class="inactive parentlink" id="<?php echo strtolower($kat->nama);?>">{{$kat->nama}}</a>
					<ul id="{{$parent}}" class="child1">
						<?php $child=0;?>
						@foreach($kategori as $kat2)
						@if ($kat2->parent==$kat->id)
						<?php $child++;?>
						<li class="parentcat">
							<a @foreach($kategori as $bug)
							@if ($bug->parent==$kat2->id)
							class="expand toc_collapsed"
							@endif
							@endforeach
							style="cursor:default; display:run-in; padding-right:7px;float:left;width: 8px;">
						</a>
						<a href="{{slugKategori($kat2)}}" class="inactive {{$kat->nama}}" style="text-decoration: none;">{{$kat2->nama}}</a>
						<ul>
							@foreach($kategori as $kat3)
							@if ($kat3->parent==$kat2->id)
							<li><a href="{{slugKategori($kat3)}}" class="active" style="text-decoration: none;">{{$kat3->nama}}</a></li>
							@endif
							@endforeach
						</ul>
					</li>
					@endif
					@endforeach
					@if($child==0)
					@endif
				</ul></li>
				@endif
				@endforeach
			</ul>
		</div>
	</div>
	<!-- End Text -->
</div>
<!-- best seller section-->
<div class="box-color-1 box-shadow">
	<!-- Title -->
	<h3 class="box-color-1-title"><span>Merk Produk</span></h3>
	<!-- Text -->
	<div class="box-color-1-text">
		<!-- List items -->
		<ul class="list-items" style="padding: 1px 0px 1px 10px;">
			@foreach($koleksi as $key=>$mykoleksi)
			<li style="padding:0;">
				<div class="img" style="text-align: center;width:100%;">
					<a href="{{slugKoleksi($mykoleksi)}}">
						{{HTML::image(koleksi_image_url($mykoleksi->gambar), $mykoleksi->nama, array('height' => '60px'));}}
					</a>
				</div>
					<!-- <div class="text float-left">
					<strong><a href="{{slugKoleksi($mykoleksi)}}">{{$mykoleksi->nama}}</a></strong>
				</div> -->
				<p class="clear"></p>
			</li>
			@endforeach
		</ul>
		<ul class="btn">
			@for( $s = 1; $s <= ceil($key/3); $s++ )
			<li><a href="#">{{$s}}</a></li>
			@endfor
		</ul>
	</div>
	<!-- End Text -->
</div>
<!--Banner section-->
<div id="banner" class="banner box-no-bg" style="width: auto">
	@foreach(vertical_banner() as $item)
	<div style="width:220px;">
		<a href="{{URL::to($item->url)}}"><img src="{{URL::to(banner_image_url($item->gambar))}}" style="display:block" class="box-shadow" width="220px"/></a>
	</div><br>
	@endforeach
</div>
</div>
<!-- =================== -->
<!-- END Left column section -->
<!-- =================== -->
<!-- Product desc section -->
<div class="grid-9 float-left">
	<div class="box-color-2 box-shadow">
		<!-- Title -->
		<h3 class="box-color-2-title"><span>{{$produk->nama}}</span></h3>
		<!-- Text -->
		<div class="box-color-2-text">
			<div class="product-info">
				<div class="left">
					<div class="image">
						@if($produk->gambar1!='')
						<a href="{{URL::to(product_image_url($produk->gambar1))}}" class="colorbox" rel="colorbox">
							{{HTML::image(product_image_url($produk->gambar1,'large'), '',array('id' => 'image'))}}
						</a>
						@endif
					</div>
					<div class="image-additional">
						@if($produk->gambar2!='')
						<a href="{{URL::to(product_image_url($produk->gambar2))}}" class="colorbox" rel="colorbox">
							{{HTML::image(product_image_url($produk->gambar2,'thumb'))}}
						</a>
						@endif
						@if($produk->gambar3!='')
						<a href="{{URL::to(product_image_url($produk->gambar3))}}" class="colorbox" rel="colorbox">
							{{HTML::image(product_image_url($produk->gambar2,'thumb'))}}
						</a>
						@endif
						@if($produk->gambar4!='')
						<a href="{{URL::to(product_image_url($produk->gambar4))}}" class="colorbox" rel="colorbox">
							{{HTML::image(product_image_url($produk->gambar4,'thumb'))}}
						</a>
						@endif
					</div>
				</div>
				<div class="right">
					<div class="description">
						<span>Vendor :</span> {{($produk->vendor)}}<br />
						<span>Berat :</span> {{($produk->berat)}} (gram)<br />
						<span>Stock :</span>  
						@if($produk->stok>0)
						Tersedia<br/>
						@else
						Habis<br/>
						@endif
					</div>
					<!-- Info product -->
					<div class="info-product">
						<form action="#" id='addorder'>
							<div class="price">
								@if($produk->hargaJual!=0)
								Harga :
								@if($produk->hargaCoret!=0)
								<span class="price-old">{{ price($produk->hargaCoret) }}</span>
								@endif
								<span style="font-size: large;" class="price-new">{{ price($produk->hargaJual) }}</span>
								<br />
								@else
								<span style="font-weight: bold;color: red;">Call for Price !!!</span>
								@endif
							</div>
							@if($opsiproduk->count()>0)
							<div class="options">
								<h2>Opsi</h2>
								<div id="option" class="option">
									<span class="required">*</span>
									<b>Opsi:</b>
									<select name="opsiproduk">
										<option value="">-- Pilih Opsi --</option>
										@foreach ($opsiproduk as $key => $opsi)
										<option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}} >
											{{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{jadiRupiah($opsi->harga)}}
										</option>
										@endforeach
									</select>
								</div>
							</div>
							@endif
							<div class="cart">
								<div class="cart-button-product">
									Jumlah
									<input type="text" name="qty" class="input" size="2" value="1" />

									<input type='submit' id="button-cart" class="button" value='Tambah ke keranjang'>
								</div>
								<div class="cart-text">
									<!-- wishlist dan komper-->
									<!-- end -->
								</div>
								<div class="review">
									<div class="share"><!-- AddThis Button BEGIN -->
										<div class="addthis_default_style">
											<a class="addthis_button_facebook"></a>
											<a class="addthis_button_twitter"></a>
										</div>
										<!-- AddThis Button END -->
									</div>
								</div>
							</div>
						</form>
					</div>
					<!-- End product info -->
				</div>
			</div>
			<div id="tabs" class="htabs">
				<a style="cursor:pointer;" id="desk">Deskripsi produk</a>
				<a style="cursor:pointer;" id="review">Review produk</a>
			</div>
			<div id="tab-description" class="tab-content">
				{{$produk->deskripsi}}
			</div>
			<div id="tab-review" class="tab-content" style="display:none;">
				{{pluginTrustklik()}}
			</div>
		</div>
	</div>
</div>
<!-- End Center -->