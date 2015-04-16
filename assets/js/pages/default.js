define(['jquery','nivo','noty'], function($)
{
	return new function(){
		var self = this;
		self.run = function(){

			$('#tabs a').tabs();

			// tampilkan error noty
			var msg = $('#message');
			if(msg.length){
				type = $(msg).attr('class');
				text = $(msg).html();
				noty({"text":text,"layout":"top","type":type});    
			}

			if( $('#categories').length > 0) {

				var position_left = $("#categories ul").eq(0).position().left;

				$("#categories > ul > li ").hover(function () {
					var position_li = $(this).position().left;
					var width_sub = $(this).find("div").outerWidth(true);
					var troznica = position_li+width_sub;
					var oroznica = position_left+940;
					var kroznica = troznica-oroznica+35;
					if(troznica>oroznica) {
						$(this).find("div").css("margin-left", "-"+kroznica+"px");
					}
				});
				
			}
			
			
			/* Search */
			$('#submenu .button-search').bind('click', function() {
				url = $('base').attr('href') + 'index.php?route=product/search';
						 
				var search = $('#submenu input[name=\'search\']').attr('value');
				
				if (search) {
					url += '&search=' + encodeURIComponent(search);
				}
				
				location = url;
			});
			
			$('#submenu input[name=\'search\']').bind('keydown', function(e) {
				if (e.keyCode == 13) {
					url = $('base').attr('href') + 'index.php?route=product/search';
					 
					var search = $('#submenu input[name=\'search\']').attr('value');
					
					if (search) {
						url += '&search=' + encodeURIComponent(search);
					}
					
					location = url;
				}
			});


			// Animation for the languages and currency dropdown
			$('.switcher').hover(function() {
				$(this).find('.option').stop(true, true).slideDown(300);
			},function() {
				$(this).find('.option').stop(true, true).slideUp(150);
			}); 

			$(".box-category > ul > li a ").hover(function () {
				$(this).stop().animate({ paddingLeft: "5" }, "fast"); },
			function () {
				$(this).stop().animate({ paddingLeft: "0" }, "medium");
			}); 

			$('#cart').hover(function() {
				$(this).find('.content').css("display", "block");
			},function() {
				$(this).find('.content').css("display", "none");
			}); 

			/* Items */
			var item = 3; // list of items on one page
			var active = 0;
			var allitems = $(".btn li a").length;
			var block = 0;
			$(".list-items li").css("display", "none");
			$(".list-items li").slice(0, item).css("display", "block");
			$('.btn li a').eq(0).addClass("active");

			setInterval(rotate,15000);
			$('.btn li a').click(function() {
				var element_index = $('.btn li a').index(this);
				active = element_index;
				$('.btn li a').removeClass("active");
				$(this).addClass("active");
				$(".list-items li").hide();
				$(".list-items li").slice(element_index*item, element_index*item+item).fadeIn(400);
				block = 1;
				return false;
			});



			/* Submenu */
			var welcome = '';
			$('#categories > ul > li').hover(function() {
				$("#categories li").removeClass("active");
				$(".welcome-text").html(welcome);
			}); 

			$('#categories > ul > li.submenu').hover(function() {
				$("#categories li.submenu").removeClass("active");
				$(this).addClass("active");
				$(".welcome-text").css("display", "block");
				$(".welcome-text").html($(this).find("div").html());
				
				$("#categories li.submenu div").css("display", "none");

			}); 

			$("#categories > ul > li.standard").hover(function () {
				$(this).children('div').slideDown(50, function() {
				// Animation complete.
				});

			 },function () {
				$(this).children('div').slideUp(50, function() {
				// Animation complete.
				});  
			}); 


			$("#categories > ul > li.standard > div > ul > li").hover(function () {
				
				$(this).children('ul.subsubmenu').slideDown(50, function() {
				// Animation complete.
				});

			 },function () {
				$(this).children('ul.subsubmenu').slideUp(50, function() {
				// Animation complete.
				});  
			});  

			/* autoclear function for inputs */
			$('.autoclear').click(function() {
				if (this.value == this.defaultValue) {
					this.value = '';
				}
			});

			$('.autoclear').blur(function() {
				if (this.value == '') {
					this.value = this.defaultValue;
				}
			});

			var rotate = function(){

				if(block == 0 && allitems>1) {

					if(active+1 < allitems) {

						active++;
						$('.btn li a').removeClass("active");
						$('.btn li a').eq(active).addClass("active");
						$(".list-items li").hide();
						$(".list-items li").slice(active*item, active*item+item).fadeIn(400);

					} else {

						active = 0;
						$('.btn li a').removeClass("active");
						$('.btn li a').eq(active).addClass("active");
						$(".list-items li").hide();
						$(".list-items li").slice(active*item, active*item+item).fadeIn(400);

					}

				}

			};

	    }

	    $.fn.tabs = function() {
			var selector = this;
			
			this.each(function() {
				var obj = $(this); 
				
				$(obj.attr('href')).hide();
				
				$(obj).click(function() {
					$(selector).removeClass('selected');
					
					$(selector).each(function(i, element) {
						$($(element).attr('href')).hide();
					});
					
					$(this).addClass('selected');
					
					$($(this).attr('href')).fadeIn();
					
					return false;
				});
			});

			$(this).show();
			
			$(this).first().click();
		};
	}
});