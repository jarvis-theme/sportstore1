var dirTema = document.querySelector("meta[name='theme_path']").getAttribute('content');

require.config({
	baseUrl: '/',
	waitSeconds: 300,
	urlArgs : 'v=001',
	shim: {
		"bootstrap"	: {
			deps: ['jquery'],
		},
		"cookie" : {
			deps : ['jquery'],
		},
		'jq_ui' : {
			deps : ['jquery'],
		},
		"noty" : {
			deps : ['jquery'],
		},
		"nivo" : {
			deps : ['jquery'],
		},
		"tabs" : {
			deps : ['jquery'],
		},
	},

	paths: {
		// LIBRARY
		bootstrap 		: ['//maxcdn.bootstrapcdn.com/bootstrap/2.2.1/js/bootstrap.min','js/bootstrap.min'],
		cart			: dirTema+'/assets/js/libs/cart',
		flexslider		: dirTema+'/assets/js/libs/jquery.flexslider',
		nivo			: dirTema+'/assets/js/libs/jquery.nivo.slider.pack',
		form_elements	: dirTema+'/assets/js/libs/form_elements',
		jcarousel		: dirTema+'/assets/js/libs/jquery.jcarousel.min',
		jquery 			: ['//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min',dirTema+'/assets/js/libs/jquery1.7.2.min'],
		noty			: dirTema+'/assets/js/libs/noty',
		simpletabs		: dirTema+'/assets/js/libs/simpletabs_1.3',
		cookie			: dirTema+'/assets/js/libs/jquery.cookie',
		tabs			: dirTema+'/assets/js/libs/tabs',
		

		// Harus Ada
		router          : 'js/router',
		jq_ui			: 'js/jquery-ui',
		noty			: 'js/jquery.noty',
		cart          	: 'js/shop_cart',

		// CONTROLLER
		home            : dirTema+'/assets/js/pages/home',
		member          : dirTema+'/assets/js/pages/member',
		main            : dirTema+'/assets/js/pages/default',
		product         : dirTema+'/assets/js/pages/product',
		member         : dirTema+'/assets/js/pages/member',
	}
});
require([
	'router',
	'main',
	'cart'
], function(router,main,cart)
{
	router.define('/','home@run');
	router.define('home','home@run');
	router.define('produk/*','product@run');
	router.define('category/*','product@run');
	router.define('koleksi/*','product@run');
	router.define('member','member@run');
	main.run();
	cart.run();
	router.run();
});