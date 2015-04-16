<!-- ============== -->
<!-- Footer section -->
<!-- ============== -->
<div id="footer">
	<!-- Footer Navigation -->
	<div class="set-size footer-navigation grey-50">
		<div class="grid-5 float-left">
			<a href={{URL::to("halaman/about-us")}}><h3 class="green">SELAMAT DATANG DI HETEROKU.COM</h3></a>
			<p class="clear"></p><br>
			<p>{{shortDescription($aboutUs[1]->isi,300)}} </p>
		</div>
		<div class="grid-4 float-left">
			<ul>
				<h3><span class="white">PHONE : </span><span class="orange">{{$kontak->telepon}}</span></h3><br>
				<h3><span class="white">HANDPHONE : </span><span class="orange">{{$kontak->hp}}</span></h3><br>
				<h3><span class="white">EMAIL : </span><span class="orange">{{$kontak->email}}</span></h3><br>
				<h3><span class="white">PIN BBM : </span><span class="orange">{{$kontak->bb}}</span></h3><br>
				
			</ul>
		</div>
		<div class="grid-3 float-left">
			<h3><span class="white">FOLLOW</span><span class="orange">US</span></h3>
			<br>
			<!-- FACEBOOK -->
			<div id="facebook_footer" class="grid_3">
				<div class="facebook-outer">
					<div id="facebook" >
						<div id="fb-root"></div>
						<script>(function(d, s, id) {
							var js, fjs = d.getElementsByTagName(s)[0];
							if (d.getElementById(id)) return;
							js = d.createElement(s); js.id = id;
							js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
							fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>
						<div class="fb-like-box" data-href="{{$kontak->fb}}" data-colorscheme="light" data-show-faces="false" data-header="true" data-stream="false" data-show-border="true"></div>
					</div>
				</div><br>
				<h3>
				<a href='ymsgr:sendIM?{{$kontak->ym}}'><img style="border-radius: 15px;" src='http://opi.yahoo.com/online?u={{$kontak->ym}}&m=g&t=2' > </a>
				{{--ymyahoo($kontak->ym)--}}
				</h3><br>
			</div>
		</div>
	</div>
	<p class="clear"></p>
	<!-- Separator --><p class="separator"></p>
	<div class="set-size footer-navigation grey-50">
		@foreach($tautan as $key=>$group)
			@if($key>=0)
			<div class="grid-3 float-left">
				<h3 class="white">{{$group->nama}}</h3>
				<ul>
					@foreach($quickLink as $key=>$link)
					@if($group->id==$link->tautanId)
					<li>
						@if($link->halaman=='1')
						<a href={{"'".URL::to(strtolower($link->linkTo))."'"}}>{{$link->nama}}</a>
						@elseif($link->halaman=='2')
						<a href={{"'".URL::to("blog/".strtolower($link->linkTo))."'"}}>{{$link->nama}}</a>
						@elseif($link->url=='1')
						<a href="{{strtolower($link->linkTo)}}">{{$link->nama}}</a>
						@else
						<a href="{{URL::to(strtolower($link->linkTo))}}">{{$link->nama}}</a>
						@endif
					</li>
					@endif
					@endforeach
				</ul>
			</div>
			@endif
		@endforeach
		<p class="clear"></p>
		@if(!empty($bank))
			<div class="grid-12 float-left">
				<ul>
					@foreach($bank as $value)
							<img style="margin: 0 auto;" src="{{URL::to('img/'.$value->bankdefault->logo)}}" alt="{{$value->name}}"/>
					@endforeach
				</ul>
			</div>
		@endif
	</div>
	<!-- End footer navigation -->
	<!-- Separator --><p class="separator"></p>
	<!-- Copyright -->
	<div class="set-size-grid copyright grey-50">© {{date('Y')}} {{ Theme::place('title') }}. Powered by <a href="http://jarvis-store.com">Jarvis Store</a> </div>
	<!-- End copyright -->
</div>

@if(Session::has('message'))
<div class='success' id='message' style='display:none'>
    {{Session::get('message')}}
</div>
@endif
@if(Session::has('error'))
<div class='error' id='message' style='display:none'>
    {{Session::get('error')}}
</div>
@endif

@if(count($errors)>0)
<div class='error' id='message' style='display:none'>
    <ul>
    @foreach(@$errors->all() as $message)
    <li>{{ $message }}</li>
    @endforeach
    </ul>
</div> 
@endif