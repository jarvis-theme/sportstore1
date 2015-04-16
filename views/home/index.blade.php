<!-- ================ -->
<!-- Featured section -->
<!-- ================ -->
<div class="grid-12 float-left">
	<div class="box-color-1 box-shadow" style="height: 300px;">
		<!-- Text -->
		<div class="box-color-2-text">
			<div class=" jcarousel-skin-tango">
				<div class="jcarousel-container jcarousel-container-horizontal" style="position: relative; display: block;">
					<div class="jcarousel jcarousel-clip-horizontal" style="position: relative;height:280px">
						<ul id="newest-products1" class="jcarousel-list jcarousel-list-horizontal" style="overflow: hidden; position: relative; top: 0px; margin: 0px; padding: 0px; left: -510px; width: 1460px;">
							<!-- Item -->
							@foreach(list_product() as $key=>$myproduk)
							<li class="" style="float: left; list-style: none;height: 300px;" jcarouselindex="{{$key}}">
								<!-- Img -->
								<div class="img" style="text-align: center;">
									<a href="{{product_url($myproduk)}}">
										<img src="{{product_image_url($myproduk->gambar1,'medium')}}" alt="{{$myproduk->nama}}" width="150px">
									</a>
								</div>
								<h2>
									<a href="{{slugProduk($myproduk)}}">
										{{shortName($myproduk->nama, 68)}}
									</a>
								</h2>
								<p class="price" style="padding-bottom:5px;text-align: center;padding-top: 8px;">
									@if($myproduk->hargaJual!=0)
									<span style="display:block;position:relative;margin:-4px 0px 0px 0px;padding-bottom:1px;font-weight: bold;color: #92c005;">{{price($myproduk->hargaJual)}}</span>
									@else
									<span style="display:block;position:relative;margin:-4px 0px 0px 0px;padding-bottom:1px;font-weight: bold;color: red;text-align: center;">Call for Price !!!</span>
									@endif

								</p>
								<div style="text-align: center;"><a href="{{product_url($myproduk)}}" class="button"><span>Lihat Detail</span></a></div>
							</li>
							<!-- End item -->
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- End Text -->
	</div>
</div>
<!-- ======== -->
<!-- Terlaris -->
<!-- ======== -->
<div class="grid-3 float-left">
	<!-- Box -> Bestseller -->
	<div class="box-color-1 box-shadow">
		<!-- Title -->
		<h3 class="box-color-1-title"><span>Produk Terlaris</span></h3>
		<!-- Text -->
		<div class="box-color-1-text">
			<!-- List items -->
			<ul class="list-items">
				<?php $count=1;?>
				@foreach(best_seller() as $key=>$myproduk)
				@if($myproduk->terlaris=='1')
				<li>
					<div class="img float-left">
						<a href="{{slugProduk($myproduk)}}">
							{{HTML::image(product_image_url($myproduk->gambar1,'medium'), $myproduk->nama, array('width' => '60px', 'height' => '60px'));}}
						</a>
					</div>
					<div class="text float-left">
						<strong><a href="{{slugProduk($myproduk)}}">{{shortName($myproduk->nama,30)}}</a></strong>
						<p class="price">
							{{price($myproduk->hargaJual)}}
						</p>
					</div>
					<p class="clear"></p>
				</li>
				<?php $count++;?>
				@if ($count>=15)
				<?php break;?>
				@endif
				@endif
				@endforeach
			</ul>
			<ul class="btn">
				<?php $test = ceil($count/3);?>
				<?php for( $s = 1; $s <= $test; $s++ ) { ?>
				<li><a href="/#"><?php echo $s; ?></a></li>
				<?php } ?>
			</ul>
		</div>
		<!-- End Text -->
	</div>
	<!-- End Box -> Bestseller -->
</div>
<!-- ======= -->
<!-- Terbaru -->
<!-- ======= -->
<!-- Box -> Latest -->
<div class="float-left column-right-home grid-9">
	<div class="grid-3 float-left">
		<!-- Box -> Latest -->
		<div class="box-color-2 box-shadow" style="margin-top: 20px;">
			<!-- Title -->
			<h3 class="box-color-2-title"><span>Produk Terbaru</span></h3>
			<!-- Text -->
			<div class="box-color-2-text">
				<div class=" jcarousel-skin-tango">
					<div class="jcarousel-container jcarousel-container-horizontal" style="position: relative; display: block;">
						<div class="jcarousel jcarousel-clip jcarousel-clip-horizontal" style="position: relative;">
							<ul id="newest-products2" class="jcarousel-list jcarousel-list-horizontal" style="overflow: hidden; position: relative; top: 0px; margin: 0px; padding: 0px; left: -510px; width: 1460px;">
								<!-- Item -->

								@foreach(latest_product() as $key=>$myproduk)

								<li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-{{$key}} jcarousel-item-{{$key}}-horizontal" style="float: left; list-style: none;" jcarouselindex="{{$key}}">
									<!-- Img -->
									<div class="img" style="text-align: center;">
										<a href="{{product_url($myproduk)}}">
											<img src="{{URL::to(product_image_url($myproduk->gambar1,'medium'))}}" alt="{{$myproduk->nama}}" width="140px">
										</a>
									</div>
									<h2>
										<a href="{{product_url($myproduk)}}">
											{{shortName($myproduk->nama, 70)}}
										</a>
									</h2>
									<p class="price" style="padding-bottom:5px;padding-top: 8px;">
										@if($myproduk->hargaJual!=0)
										<span style="display:block;position:relative;margin:-4px 0px 0px 0px;padding-bottom:1px;font-weight: bold;color: #92c005;text-align: center;">{{price($myproduk->hargaJual)}}</span>
										@else
										<span style="display:block;position:relative;margin:-4px 0px 0px 0px;padding-bottom:1px;font-weight: bold;color: red;text-align: center;">Call for Price !!!</span>
										@endif
									</p>
									<div style="text-align: center;"><a href="{{product_url($myproduk)}}" class="button"><span>Lihat Detail</span></a></div>
								</li>
								<!-- End item -->
								@endforeach
							</ul>
						</div>
						<div class="jcarousel-prev jcarousel-prev-horizontal" style="display: block;"></div>
						<div class="jcarousel-next jcarousel-next-horizontal" style="display: block;"></div>
					</div>
				</div>
			</div>
			<!-- End Text -->
		</div>
		<!-- End Box -> Latest -->
	</div>
</div>