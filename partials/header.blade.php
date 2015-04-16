<div id="top-bar">
	<div class="set-size">
		<!-- Welcome text -->
		<div class="welcome-text"></div>
		<div class="float-left" style="font-size: 15px;color: #fff;font-family: Francois One;padding: 6px 0px 0px 20px;">
			@if (is_login())

			Selamat datang {{HTML::link('member',user()->nama)}}, {{HTML::link('logout', 'logout here')}}
			
			@else
			
			Selamat berbelanja, {{HTML::link('member', 'Login here')}}

			@endif
		</div>
		<!-- End welcome text -->
	</div>
</div>
<!-- ================ -->
<!-- Branding section -->
<!-- ================ -->
<!-- ================ -->
<!-- Main Nav section -->
<!-- ================ -->
<div id="top" class="set-size">
	<!-- Logo -->
	<h1 class="float-left"><a href="{{URL::to('home')}}"><img src="{{URL::to(getPrefixDomain().'/galeri/'.$toko->logo)}}" alt="Heteroku.com: Toko Online Bagus, Aman & Terpercaya di Bali & Indonesia" /></a></h1>
	<!-- Shopping cart & menu -->
	<div class="float-right">
		<div id="cart" class="float-right">
			<div id="shoppingcartplace">
				{{shopping_cart()}}
			</div>
		</div>
		<!-- Menu -->
		<ul id="menu" class="float-right">
			@foreach($mainMenu as $key=>$link)
			@if($link->halaman=='1')
			<li><a href={{"'".URL::to("halaman/".strtolower($link->linkTo))."'"}}>{{$link->nama}}</a></li>
			@elseif($link->halaman=='2')
			<li><a href={{"'".URL::to("blog/".strtolower($link->linkTo))."'"}}>{{$link->nama}}</a></li>
			@elseif($link->url=='1')
			<li><a href={{URL::to(strtolower($link->linkTo))}}>{{$link->nama}}</a></li>
			@else
			<li><a href={{URL::to(strtolower($link->linkTo))}}>{{$link->nama}}</a></li>
			@endif
			@endforeach
		</ul>
		<!-- End menu -->
	</div>
	<!-- End shopping cart & menu -->
</div>
<!-- ================= -->
<!--Categories section -->
<!-- ================= -->
<!-- Categories -->
<div id="categories" class="set-size-grid box-shadow">
	<ul>
		@if($katMenu!='1')
		@foreach($kateg as $key=>$menu)
		@if($menu->parent=='0')
		<li class="standard">
			<a href="{{slugKategori($menu)}}">{{$menu->nama}}</a>
			<!-- Submenu -->
			@if($menu->anak->count())
			<div style="display: none;">
				<ul class="column-3">
					@foreach($menu->anak as $key2=>$menu2)
					<li><a class="highlight-child" href="{{slugKategori($menu2)}}">{{$menu2->nama}}</a>
						@if($menu2->anak->count())
						<ul class="subsubmenu box-shadow" style="display: none;">
							@foreach($menu2->anak as $key3=>$menu3)
							<li><a class="highlight-child" href="{{slugKategori($menu3)}}">{{$menu3->nama}}</a></li>
							@endforeach
						</ul>
						@endif
					</li>
					@endforeach
				</ul>
			</div>
			@endif
			<!-- End submenu -->
		</li>
		@endif
		@endforeach
		@endif
	</ul>
</div>
<!-- End categories -->
<!-- =================== -->
<!-- Info/Search section -->
<!-- =================== -->
<div id="submenu" class="set-size-grid box-shadow">
	<!-- Search -->
	<div id="search" class="float-right">
		<form action="{{URL::to('search')}}" method='post'>
			<p class="custom-orange float-left">Search</p>
			<input type="text" name="search" class="search-text autoclear float-left" placeholder="Search" />
			<button class="button-search search-submit float-left"></button>
		</form>
	</div>
	<!-- End search -->
</div>