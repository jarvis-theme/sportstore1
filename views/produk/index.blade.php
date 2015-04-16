<span style="margin-left: 20px;margin-top: -37px;position: absolute;left:0;">{{breadcrumbProduk(null,'; <span> > </span>',';', false, $kategoridetail)}}</span>
<!-- =================== -->
<!-- Left column section -->
<!-- =================== -->
<!-- best -->
<div class="grid-3 float-left">
	<!-- Categories section -->
	<div class="box-color-3 box-shadow">
		<!-- Title -->
		<h3 class="box-color-3-title"><span>Kategori Produk</span></h3>
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
						style="cursor:default; display:run-in; padding-right:7px;float:left;width: 8px;">&nbsp;&nbsp;</a>
						<a href="{{slugKategori($kat)}}" class="inactive parentlink" id="<?php echo strtolower($kat->nama);?>">{{$kat->nama}}</a><ul id="{{$parent}}" class="child1">
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
							style="cursor:default; display:run-in; padding-right:7px;float:left;width: 8px;">&nbsp;&nbsp;</a>
							<a href="{{slugKategori($kat2)}}" class="inactive {{$kat->nama}}" style="text-decoration: none;">{{$kat2->nama}}</a><ul>
							@foreach($kategori as $kat3)
							@if ($kat3->parent==$kat2->id)
							<li><a href="{{slugKategori($kat3)}}" class="active" style="text-decoration: none;">{{$kat3->nama}}</a></li>
							@endif
							@endforeach
						</ul></li>
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
	<!-- reccomended Box -> -->
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
							{{HTML::image(koleksi_image_url($mykoleksi->gambar,'thumb'), $mykoleksi->nama, array('height' => '60px'));}}
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
<!-- End Box -> Bestseller -->
<div id="banner" class="banner box-no-bg" style="width: auto">
	@foreach(vertical_banner() as $item)
	<div><a href="{{URL::to($item->url)}}"><img src="{{URL::to( banner_image_url($item->gambar))}}" style="display:block" class="box-shadow" width="220px"/></a></div>
	<br>
	@endforeach
</div>
</div>
<!--Banner section-->
<!-- ======================= -->
<!-- END Left column section -->
<!-- ======================= -->
<div class="grid-9 float-left" style="padding: 0px;">
	<!-- Box -->
	<div class="box-color-2 box-shadow">
		<!-- Title -->
		<h3 class="box-color-2-title"><span>{{$name}}</span></h3>
		<!-- Text -->
		<div class="box-color-2-text">
			<div class="product-filter">
				<div class="display">
					<h2 class="color-h2">Display : </h2>
					<div class="view-list-active">List</div>
					<div class="view-grid">
						<a href="" class="data-view" data-view="grid">Grid</a>
					</div>
				</div>
				<div class="limit">Limit
					<select onchange="if (this.value) window.location.href='{{url('produk?show=')}}'+this.value">
						<option value="12" {{ Input::get('show') == 12 ? 'selected' : ''}}>12</option>
						<option value="24" {{ Input::get('show') == 24 ? 'selected' : ''}}>24</option>
					</select>
				</div>
			</div>
			<div class="product-list">
				@foreach(list_product(12,@$category, @$collection) as $myproduk)
				<div>
					{{is_terlaris($myproduk)}}
					{{is_produkbaru($myproduk)}}
					{{is_outstok($myproduk)}}
					<div class="image">
						<a href="{{slugProduk($myproduk)}}">
							{{HTML::image(product_image_url($myproduk->gambar1,'medium'), $myproduk->nama, array( 'width' => '150px', 'height' => '100px', 'alt' => ($myproduk->nama), 'title' => ($myproduk->nama)))}}
						</a>
					</div>
					<div class="name">
						<a href="{{slugProduk($myproduk)}}">{{$myproduk->nama}}</a>
						<div class="description">
							{{short_description($myproduk->deskripsi,200)}}
						</div>
					</div>
					<div class="product-text">
						<div class="price" style="text-align: center;">
							@if($myproduk->hargaJual!=0)
							@if($myproduk->hargaCoret!=0)
							<span class="price-old">{{ price($myproduk->hargaCoret) }}</span>
							@endif
							<span class="price-new" style="font-size: 15px;">{{ price($myproduk->hargaJual) }}</span>
							@else
							<span style="font-weight: bold;color: red;">Call for Price !!!</span>
							@endif
						</div>
						<div class="cart" style="text-align: center;">
							<a href="{{product_url($myproduk)}}" class="button"><span>Lihat Produk</span></a>
						</div>
					</div>
				</div>
				<p class="border-content clear list"></p>
				@endforeach
			</div>
			<br><br>
			<div class="pagination">
				<div class="pagination">

					<div class="links">
						{{list_product(12,@$category, @$collection)->appends(['show' => \Input::get('show',12)])->links()}}
					</div>
					<div class="results">Showing {{list_product(12,@$category, @$collection)->getFrom()}} to {{ceil(list_product(12,@$category, @$collection)->getTotal()/list_product(12,@$category, @$collection)->getPerPage())}} page(s)</div>
				</div>
			</div>
		</div>
	</div>
</div>