{{HTML::script(dirTemaToko().'sportstore1/assets/js/jquery.cookie.js')}}

<!-- ============== -->
<!-- Search section -->
<!-- ============== -->

<div class="grid-12 float-left">
	
<!-- Box -->

	<div class="box-color-2 box-shadow">

	<!-- Title -->

		<h3 class="box-color-2-title"><span>Hasil Pencarian</span></h3>

	<!-- Text -->

		<div class="box-color-2-text">
			
			<div class="product-filter">
				<div class="display">
					<h2 class="color-h2">Display : </h2> 
					<div class="view-list-active">List</div>
					<div class="view-grid">
						<a onclick="display('grid');">Grid</a>
					</div>
				</div>
				<div class="limit">Limit
					<select onchange="location = URL::to('produk');">
						<option value="12">12</option>
						<option value="24">24</option>
					</select>
				</div>
			</div>
			
			<div class="product-list">
				@foreach($hasilpro as $myproduk)
					<div>
						{{is_terlaris($myproduk)}}
						{{is_produkbaru($myproduk)}}
						{{is_outstok($myproduk)}}
						<div class="image">
							<a href="{{slugProduk($myproduk)}}">
								{{HTML::image(getPrefixDomain().'/produk/'.$myproduk->gambar1, $myproduk->nama, array( 'width' => '150px', 'height' => '100px', 'alt' => ($myproduk->nama), 'title' => ($myproduk->nama)))}}
							</a>
						</div>
						<div class="name">
							<a href="{{slugProduk($myproduk)}}">{{$myproduk->nama}}</a>
							<div class="description">
								{{shortDescription($myproduk->deskripsi,100)}}
							</div>
						</div>
						<div class="product-text">
							<div class="price">
								@if($myproduk->hargaJual!=0)
									@if($myproduk->hargaCoret!=0)
										<span class="price-old">{{ jadiRUpiah($myproduk->hargaCoret) }}</span>
									@endif
									<span class="price-new" style="font-size: 15px;">{{ jadiRUpiah($myproduk->hargaJual) }}</span>
								@else
								<span style="font-weight: bold;color: red;">Call for Price !!!</span>
								@endif
							</div>
							<div class="cart">
								<a href="{{slugProduk($myproduk)}}" class="button"><span>Lihat</span></a>
							</div>
						</div>
					</div>
					<p class="border-content clear list"></p>
				@endforeach
			</div><br><br>
			<div class="pagination">
				<div class="pagination">
					<div class="links">
						@for($i=1;$i<=ceil($hasilpro->getTotal()/$hasilpro->getPerPage());$i++)
							@if($hasilpro->getCurrentPage()==$i)
								<b>{{$i}}</b>
							@else
								<a href="{{$hasilpro->getUrl($i)}}">{{$i}}</a>
							@endif              
						@endfor
					</div>
					<div class="results">Showing {{$hasilpro->getFrom()}} to {{ceil($hasilpro->getTotal()/$hasilpro->getPerPage())}} page(s)</div>
				</div>
			</div>

		</div>

	</div>	

</div>	
  <!-- End Center -->	
  
  
  
  
<script type="text/javascript">
function display(view) 
{
	if (view == 'list') 
	{	
		$('.grid').css("display", "none");
		$('.list').css("display", "block");
		$('.product-grid').attr('class', 'product-list');

		$('.product-list > div').each(function(index, element) 
		{
			html  = '<div class="product-text">';

			var price = $(element).find('.price').html();

			if (price != null) 
			{
				html += '<div class="price">' + price  + '</div>';
			}

			html += '  <div class="cart">' + $(element).find('.cart').html() + '</div>';
			html += '</div>';			

			var image = $(element).find('.image').html();

			if (image != null) 
			{ 
				html += '<div class="image">' + image + '</div>';
			}
			html += '  <div class="name">' + $(element).find('.name').html() + '</div>';

			$(element).html(html);
		});		

		$('.display').html('<div class="display"><h2 class="color-h2">Display</h2> <div class="view-list-active">List</div> <div class="view-grid"><a onclick="display(\'grid\');">Grid</a></div></div>');

		$.cookie('display', 'list'); 
	} 
	else 
	{
		$('.product-list').attr('class', 'product-grid');
		$('.list').css("display", "none");
		$('.grid').css("display", "block");
		$('.product-grid > div').each(function(index, element) 
		{
			html = '';

			var image = $(element).find('.image').html();

			if (image != null) 
			{
				html += '<div class="image">' + image + '</div>';
			}

			html += '<div class="name">' + $(element).find('.name').html() + '</div>';

			var price = $(element).find('.price').html();

			if (price != null) 
			{
				html += '<div class="price">' + price  + '</div>';
			}

			html += '<div class="cart">' + $(element).find('.cart').html() + '</div>';

			$(element).html(html);
		});	

		$('.display').html('<div class="display"><h2 class="color-h2">Display</h2> <div class="view-list"><a onclick="display(\'list\');">List</a></div> <div class="view-grid-active">Grid</div></div>');

		$.cookie('display', 'grid');
	}
}

view = $.cookie('display');

if (view) 
{
	display(view);
} 
else 
{
	display('list');
}
</script> 