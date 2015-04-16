<!-- ========= -->
<!-- Blog show -->
<!-- ========= -->	

<div class="grid-9 float-left">

	<!-- Box -->

	<div class="box-color-2 box-shadow">

	<!-- Title -->

		<h3 class="box-color-2-title"><span>Blog</span></h3>

	<!-- Text -->

		<div class="box-color-2-text">
			<h2 style="color:#92c005;font-size: x-large;">{{$detailblog->judul}}</h2></a>
			<div class="content">
				<strong>{{date("d M Y", strtotime($detailblog->updated_at))}}</strong><br><br>
				{{$detailblog->isi}}
			</div>
			{{$fbscript}}
			{{fbcommentbox(URL::to("blog/".$detailblog->slug), '640px', '5', 'light')}}
			<div class="buttons">
				@if(isset($prev))
					<div class="left"><a href="{{$prev->slug}}" class="button"><span>Sebelumnya</span></a></div>
				@else
					<div class="right"></div>
				@endif

				@if(isset($next))
					<div class="right"><a href="{{$next->slug}}" class="button"><span>Selanjutnya</span></a></div>
				@else
					<div class="right"></div>
				@endif
			</div>
		</div>
	</div>	
</div>

<!-- =============  -->
<!-- END Blog show -->
<!-- ============= -->	

<!-- ============= -->
<!-- Blog category -->
<!-- ============= -->	

<div class="grid-3 float-left">

	<!-- Box -->

	<div class="box-color-3 box-shadow">

	<!-- Title -->

		<h3 class="box-color-3-title"><span>Kategori</span></h3>

	<!-- Text -->

		<div class="box-color-3-text">
			<div class="content">
				<ul>
					@foreach($categoryList as $key=>$value)
						<li><a href="{{URL::to('blog/category/'.generateSlug($value))}}">{{$value->nama}}</a></li>
					@endforeach
				</ul>
			</div>
		</div>

	</div>	

</div>

<!-- ================= -->
<!-- END Blog category -->
<!-- ================= -->		