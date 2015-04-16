define(['jquery'], function($)
{
	return new function(){
		var self = this;
		self.run = function(){
		
			$(window).load(function() {
				$('#tabs-profile').hide();
			});
			
			$('.navigator').click(function(){
				ref	= $(this).attr('toggle');
				if (ref=='#tabs-profile')
				{
					$('#tabs-profile').show();
					$('#tabs-history').hide();
				}
				else
				{
					$('#tabs-history').show();
					$('#tabs-profile').hide();
				}
			});

		}
	}
});