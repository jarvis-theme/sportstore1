define(['jquery','nivo','jcarousel'], function($)
{
	return new function(){
		var self = this;
		self.run = function(){
			
			
			if($('#slideshow').length){

				$('.slide').width('700px');

				$('#slideshow').nivoSlider({
					effect:"fade",
					directionNav: true, // Next & Prev navigation
					controlNav: false, // 1,2,3... navigation
					controlNavThumbs: false, // Use thumbnails for Control Nav
					pauseOnHover: true, // Stop animation while hovering
					manualAdvance: false, // Force manual transitions
				});
			}

			$(document).ready(function() {
				$('#newest-products1').jcarousel({
					wrap: 'last',
					initCallback: mycarousel_initCallback
				});
				
				$('#newest-products2').jcarousel({
					wrap: 'last',
					initCallback: mycarousel_initCallback
				});
			});

		}
		var mycarousel_initCallback = function(carousel)
			{
				// Disable autoscrolling if the user clicks the prev or next button.
				carousel.buttonNext.bind('click', function() {
					carousel.startAuto(0);
				});
			
				carousel.buttonPrev.bind('click', function() {
					carousel.startAuto(0);
				});
			
				// Pause autoscrolling if the user moves with the cursor over the clip.
				carousel.clip.hover(function() {
					carousel.stopAuto();
				}, function() {
					carousel.startAuto();
				});
			};
	}
});