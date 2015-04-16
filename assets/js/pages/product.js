define(['jquery','cookie','cart'], function($,cookie,cart)
{
	return new function(){
		var self = this;
		self.run = function(){
			
			cart.run();

			$("#review").click(function(){
				$("#tab-description").hide("fast");
				$("#tab-review").show("fast");
			});
			$("#desk").click(function(){
				$("#tab-review").hide("fast");
				$("#tab-description").show("fast");
			});

			view = $.cookie('display');
			if (view)
			{
				display(view);
			}
			else
			{
				display('list');
			}
			$(document).on('click','.data-view',function(){
				display($(this).attr('data-view'));
				return false;
			});
			
			window.onload=function()
			{
				link = document.URL;
				newstr = link.split("/");
				kateg = newstr[4];
				$("#"+kateg).removeClass("inactive");
				$("#"+kateg).attr("class", "active parentlink");
				//$("#"+kateg).prev().text("");
				expandremove();
			};

			$(".expand").click(function(){
				if ($(this).attr("class")=='expand toc_collapsed')
				{
					$(this).next().removeClass("inactive");
					$(this).next().attr("class", "active parentlink");
					$(this).attr("class", "expand upc_collapsed");
				}
				else
				{
					$(this).next().removeClass("active");
					$(this).next().attr("class", "inactive parentlink");
					$(this).attr("class", "expand toc_collapsed");
				}
			});
	    };

	    var display = function(view)
		{
			if (view == 'list')
			{
				$('.grid').css("display", "none");
				$('.list').css("display", "block");
				$('.product-grid').attr('class', 'product-list');
				$('.product-list > div').each(function(index, element)
				{
					html = '<div class="product-text">';
					var price = $(element).find('.price').html();
					if (price != null)
					{
						html += '<div class="price">' + price + '</div>';
					}
					html += ' <div class="cart">' + $(element).find('.cart').html() + '</div>';
					html += '</div>';
					var image = $(element).find('.image').html();
					if (image != null)
					{
						html += '<div class="image">' + image + '</div>';
					}
					html += ' <div class="name">' + $(element).find('.name').html() + '</div>';
					$(element).html(html);
				});
				$('.display').html('<div class="display"><h2 class="color-h2">Display</h2> <div class="view-list-active">List</div> <div class="view-grid"><a data-view="grid" class="data-view">Grid</a></div></div>');
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
						html += '<div class="price" style="text-align: center;">' + price + '</div>';
					}
					html += '<div class="cart" style="text-align: center;">' + $(element).find('.cart').html() + '</div>';
					$(element).html(html);
				});
				$('.display').html('<div class="display"><h2 class="color-h2">Display</h2> <div class="view-list"><a data-view="list" class="data-view">List</a></div> <div class="view-grid-active">Grid</div></div>');
				$.cookie('display', 'grid');
			}
		};

		var expandremove = function()
		{
			var count=1;
			$(".child1").each(function(){
				if ($("#"+count+" li").length<1)
				{
					$(this).prev().prev().text(' ');
				}
				count++;
			})
		};


	}
});