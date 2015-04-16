<!-- ========== -->
<!-- Blog index -->
<!-- ========== -->	

<div class="grid-9 float-left">

	<div class="box-color-2 box-shadow">


		<h3 class="box-color-2-title"><span>Blog</span></h3>


		<div class="box-color-2-text">
			@foreach(list_blog() as $key=>$value)
			<a href="{{url(blog_url($value))}}"><h2 style="color:#92c005;font-size: x-large;">{{$value->judul}}</h2></a>
			<div class="content" style="border-bottom: 1px solid #B1ADAD;">
				<strong>{{date("d M Y", strtotime($value->updated_at))}}</strong><br>
				<p>{{short_description($value->isi,250)}}</p>
				<p style="font-weight: 600;font-style: italic;"><a style="color: #005CFF;" href="{{url(blog_url($value))}}">Baca Selengkapnya →</a></p>
			</div>
			@endforeach
			<div class="pagination">
				<div class="pagination">
					<div class="links">
						@for($i=1;$i<=ceil(list_blog()->getTotal()/list_blog()->getPerPage());$i++)
							
							@if(list_blog()->getCurrentPage()==$i)
							
							<b>{{$i}}</b>

							@else
							
							<a href="{{list_blog()->getUrl($i)}}">{{$i}}</a>

							@endif
						
						@endfor
					</div>
				</div>
			</div>

		</div>

	</div>	

</div>	

<div class="grid-3 float-left" style="padding:0px;">

	<!-- Box -->

	<div class="box-color-3 box-shadow" >

		<!-- Title -->

		<h3 class="box-color-3-title"><span>Kategori</span></h3>

		<!-- Text -->

		<div class="box-color-3-text">
			<div class="content">
				<ul>
					@foreach(list_blog_category() as $key=>$value)
					<li><a href="{{blog_category_url($value)}}">{{$value->nama}}</a></li>
					@endforeach
				</ul>
			</div>
		</div>

	</div>	

</div>

