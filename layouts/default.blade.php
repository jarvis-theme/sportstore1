<!DOCTYPE html>
<html lang="en">
    
    <head>
    
        {{ Theme::partial('seostuff') }}
        {{ Theme::partial('defaultcss') }}
        {{ Theme::asset()->styles() }}
    </head>
    <body>
		{{ Theme::partial('header') }}
		<div class="set-size">
			<div id="content" style="position:relative;">
			<p class="clear"></p>
			{{ Theme::place('content') }}
			</div>
		</div>
		<p class="clear" style="height:38px"></p>
		{{ Theme::partial('footer') }}
        {{ Theme::partial('defaultjs') }} 
    </body>
    {{ Theme::partial('analytic') }}
</html>