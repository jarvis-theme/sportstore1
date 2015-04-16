@foreach(horizontal_banner() as $item)
	
	<div style="text-align: center;"><a target="_blank" href="{{URL::to($item->url)}}"><img src="{{url(banner_image_url($item->gambar))}}" width="940" /></a></div>

@endforeach

<div class="slideshow grid-9 float-left" style="width: 700px; height: 322px;">
	<div id="slideshow" class="nivoSlider box-shadow" style="width: 700px; height: 322px;">
		@foreach(slideshow() as $slide)
		<img src="{{slide_image_url($slide->gambar)}}" alt="{{$slide->text}}" title="{{$slide->text}}" class="slide" />
		@endforeach
	</div>
</div>

@foreach(vertical_banner() as $item)
<div id="banner" class="banner box-no-bg" style="width: auto;">
<div><a href="{{URL::to($item->url)}}"><img src="{{url(banner_image_url($item->gambar))}}" style="display:block; width: 220px;" class="box-shadow" /></a></div>
</div>
@endforeach
@foreach(getBanner(3) as $item)
<div id="banner" class="banner box-no-bg" style="width: auto;margin:0px;">
<div><a href="{{URL::to($item->url)}}"><img src="{{url(banner_image_url($item->gambar))}}" style="display:block; width: 460px;" class="box-shadow" /></a></div>
</div>
@endforeach