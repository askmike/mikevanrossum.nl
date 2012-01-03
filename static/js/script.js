/* Author: Mike van Rossum 

all in here is handwritten by me
*/
$(function() {
	
	//store DOM elems used multiple times in vars
	var $menu = $('#menu'),
		$pages = $('.page'),
		$pleft = $('#pleft'),
		$pleftA = $pleft.find('a'),
		$pleftDiv = $pleft.find('div'),
		$pright = $('#pright'),
		$portfolioItems = $('#portfolio-items').children(),
		
		request, //stores the request in an array
		pageIndex, //stores the current menu item (number)
		old, //stores the old menu item (number)
		oldP, //stores the old portfolio item (number)
		i,
		
		speed = 125,
		base = 60,
		offset = 10,
		
		oldRequest = [],
	
		pages = getPages(),
		pItems = getPortfolioItems();
	
	
	/* This function returns all the names of the pages in an array */	
	function getPages() {
		var array = [];
		$menu.find('li').each(function(){
			i = $(this).index();
			//all local linked (#) links inside the menu element
			array[i] = $.trim($(this).find('a[href*="#"]').text().toLowerCase());
		});
		return array;
	}
	
	/* This function returns all the names of the portfolio items in an array */
	function getPortfolioItems() {
		var array = [];
		$portfolioItems.each(function(){
			i = $(this).index();
			//h3's in the portfolio
			array[i] = $.trim($(this).find('h3').text());
		});
		return array;
	}
	
	/* This function loads a page */
	function init(request) {
		//get & parse request if none is provided
		if(!request) request = getHash();
		
		//we need to reset it because when it's not the first time, it never catches #
		pageIndex = null;
		//set map pageIndex on the request (name to number)
		if (request[0]) {
			//map request to pages
			for(var i=0, len = pages.length; i < len; i++) {
				if(pages[i] == request[0]) pageIndex = i;
			}
		}
		//if were still here no match is found, either 404 or home
		if(!pageIndex) pageIndex = 0;
		
		//only do this if we're changing pages
		if(pageIndex != old) {

			//prepare for the lavalamp (spawning or updating)
			$menu.find('li')
				.removeClass('current')
				.eq(pageIndex)
				.addClass('current');

			//if this is on pageload
			if(!isNumber(old)) {
				$menu.lavaLamp({ fx: "easeInOutCirc", speed: 400 });	
				
				//because of (something that looks like) a bug in animate I set the css also via js
				//bug: when not setting those via js the first fadeout animation breaks
				$pages
					.eq(pageIndex)
					.css({marginTop: base, opacity: 1, display: 'block'})
					.addClass('current');
				
				//showportfolio is called in fadeinpage but that never gets run on pageload
				if(request[0] == 'portfolio') showPortfolio(request);
				
			} else { //we're not on home
				$menu.find('.current').trigger('mouseenter');
				animatePage(pageIndex, request);
			}
			
			old = pageIndex;
			oldRequest = request;
			
			
		} else if(request[1] && request[1] != oldP) {
			//where not changing pages, but changing portfolio items
			changePortfolioItem(request);
		}
	}
	
	/* This function fades out a page */	
	function animatePage(index, request) {
		$('.page.current')
			.stop(true, true)
			.removeClass('current')
			.animate({marginTop: base + offset, opacity: 0}, speed, function(){
				$(this)
					.css('display','none')
					.css('marginTop', base - offset);
				fadeInPage(index, request);
		});
	}

	/* This function fades in a page */	
	function fadeInPage(index, request) {
		//specific for portfolio
		if(index == 2) $pleftDiv.add($pright).css('opacity',0);
		
		//default
		$pages.eq(index)
			.stop()
			.css('display','block')
			.animate({'marginTop': base, opacity: 1}, speed,function() {
			 	$(this).addClass('current');
				if(index == 2) showPortfolio(request);
		});
		
		pageIndex = index;
	}	

	/* This function fades in the portfolio (links + portfolio item) */	
	function showPortfolio(request) {
		//first set it to a number (-1 because items start at 0)
		var item = mapPortfolioItem(request[1]);
		
		$pleftA.eq(item).each(function(){
			$(this).addClass('current');
			var t = getPortfolioItemHtml(item);
			setPortfolioItemHtml(t);
		});
		$pright.css('opacity',0);

		
		$pleftDiv.each(function(i) {
			$(this).delay(i*speed/3).animate({opacity: 1}, speed);
		});
		fadeInPortfolioItem(speed*2);
		
	}
	
	/* This function changes a portfolio item, only when we were at portfolio and stay there */
	function changePortfolioItem(request) {
		//-1 because all the counting starts at 0
		var indexP = mapPortfolioItem(request[1]);
		
		if(indexP != oldP) {
			$pleftA
				.removeClass('current')
				.eq(indexP)
				.addClass('current');
			
			var t = getPortfolioItemHtml(indexP);
			$pright.animate({marginTop: -20, opacity: 0}, 200, function(){
				setPortfolioItemHtml(t);
				fadeInPortfolioItem();
			});
		}
		
		var oldP = indexP;
	}
	
	function getHash() {
		return parseLink(window.location.hash);
	}
	
	function parseLink(link) {
		//substr the hash
		return link.substring(1).split('/');
	}
	
	function setPortfolioItemHtml(t) {
		$pright.find('.portfolio-item').html(t);
	}
	
	function getPortfolioItemHtml(i) {
		return $portfolioItems.eq(i).html();
	}
	
	function fadeInPortfolioItem(delay) {
		$pright
			.css('marginTop',20)
			.delay(delay)
			.animate({marginTop: 0, opacity: 1}, 200);	
	}
	
	/* in JS 0 = false, I need to check if a var is set (possible 0) */
	function isNumber(i) {
		if(i || i == 0) return true;
	}
	
	/* this function  */
	function mapPortfolioItem(name) {
		for(var i=0, len = pItems.length; i < len; i++) {
			if (name == pItems[i]) return i;
		}
		return 0;
	}
	
	//bind functions to event handlers
	if( Modernizr.hashchange ) {
		$(window).bind('hashchange',function(){ //also triggers when not using site navigation (back button, etc.)
			init();
		});
	} else { //only triggers on click
		$('a[href*="#"]').on('click', function(){
			//we need to parse the href of the link clicked because the url
			//is not updated yet when this code runs
			var page = parseLink($(this).attr('href'));
			init(page);
		});
	}
	
	//boot it up on pageload
	init();
	
	//some transitions, only run those when css3 transitions are not supported
	
	//chrome currently bugs so I have to browser sniff:
	//see this bug: http://code.google.com/p/chromium/issues/detail?id=101245&q=visited%20transition&colspec=ID%20Pri%20Mstone%20ReleaseBlock%20Area%20Feature%20Status%20Owner%20Summary
	var isChrome = /chrome/.test( navigator.userAgent.toLowerCase() );
	//the css transitiona are based on classes so we need to remove it if it's chrome (else we get a buggy fade from css + the fade below)
	if (isChrome) $('#html').removeClass('csstransitions');

	if(!Modernizr.csstransitions || isChrome) {
		$('#blog-posts').children()
			.on('mouseenter', { color: '#eeeeee' }, fadeBg)
			.on('mouseleave', { color: '#ffffff' }, fadeBg);
	}
	
	function fadeBg(e) {
		$(this).stop().animate({ backgroundColor: e.data.color }, 400 );
	}
});