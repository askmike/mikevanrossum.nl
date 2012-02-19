/* Author: Mike van Rossum 

all in here is handwritten by me

TODO: it's a mess right now, should group things into scopes (or objects)

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
		$window = $(window),
		
		loc = location,
		
		request, //stores the request in an array
		pageIndex, //stores the current menu item (number)
		old, //stores the old menu item (number)
		oldP, //stores the old portfolio item (number)
		i,
		
		speed = 125,
		menuSpeed = speed*2.5,
		base = 60,
		offset = 10,
		
		oldRequest = [],
	
		pages = getPages(),
		pItems = getPortfolioItems(),
		
		//this div stores all tracking info from php
		$php = $('#php'),
		steps = [],
		starttime = new Date().getTime(),
		//this object stores everything for the analytics
		track = window.track,
		oldBlogPage = 1,
		globalPage = '';
	
	
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
	
	function mapRequest(request) {
		//set map pageIndex on the request (name to number)
		//we need to reset it because when it's not the first time, it never catches #
		pageIndex = null;
		if (request) {
			//map request to pages
			for(var i=0, len = pages.length; i < len; i++) {
				if(pages[i] == request) pageIndex = i;
			}
		}
		//if were still here no match is found, either 404 or home
		if(!pageIndex) pageIndex = 0;
	}
	
	/* This function loads a page */
	function init(request) {
		
		if(globalPage != 'post') {
			
			//get & parse request if none is provided
			if(!request) request = getHash();

			mapRequest(request[0]);

			//only do this if we're changing pages
			if(pageIndex != old) { 
				// if # is empty it's home
				var page = request[0] ? request[0] : 'home' ;

				//prepare for the lavalamp (spawning or updating)
				$menu.find('li')
					.removeClass('current')
					.eq(pageIndex)
					.addClass('current');

				//if this is on pageload
				if(!isNumber(old)) {
					initLavalamp();

					track.start(page);

					//because of (something that looks like) a bug in animate I set the css also via js
					//bug: when not setting those via js the first fadeout animation breaks
					$pages
						.eq(pageIndex)
						.css({marginTop: base, opacity: 1, display: 'block'})
						.addClass('current');

					//showportfolio is called in fadeinpage but that never gets run on pageload
					if(request[0] == 'portfolio') showPortfolio(request);

				} else { //we're not on pageload
					$menu.find('.current').trigger('mouseenter')/*.delay(menuSpeed, function() {$(this).click()}).click()*/;
					animatePage(pageIndex, request);

					track.page(page);
				}

				old = pageIndex;
				oldRequest = request;


			} else if(request[1] && request[1] != oldP) {
				//where not changing pages, but changing portfolio items
				changePortfolioItem(request);
				track.page(loc.hash);

			} if(request[0] == 'blog' && isNumber(request[1])) {
				//were changing blog pages
				changeBlogPosts(request[1]);
				track.page(loc.hash);
			}
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
			$pright.animate({marginTop: 0 - offset, opacity: 0}, speed, function(){
				setPortfolioItemHtml(t);
				fadeInPortfolioItem();
			});
		}
		
		var oldP = indexP;
	}
	
	function getHash() {
		return parseLink(loc.hash);
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
			.css('marginTop', offset)
			.delay(delay)
			.animate({marginTop: 0, opacity: 1}, speed);	
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
	
	
	
	/* on runtime */	
	
	
	//bind functions to event handlers
	if( Modernizr.hashchange ) {
		$window.bind('hashchange',function(){ //also triggers when not using site navigation (back button, etc.)
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
		$(this).stop().animate({ backgroundColor: e.data.color }, speed*2.5 );
	}
	
	//boot it up on pageload
	var $html = $('#html');
	
	if($html.hasClass('site')) init();
	if($html.hasClass('post')) postInit();
	if($html.hasClass('admin')) adminInit();
	
	if($('a.email').length) {
		var mail = 'mike' + '@' + 'mikevanrossum.nl';
		$('a.email').each(function(){
			$(this).attr("href", 'mailto:' + mail);
			$(this).text(mail);
		});
	}
	
	function changeBlogPosts(page) {
		var 
			$blogNav = $('#blog-nav'),
			link = $php.data('base') + 'json/blog/' + page,
			$blogPosts = $('#blog-posts'),
			$posts = $blogPosts.children().filter('.blog-post'),
			offset = (oldBlogPage < page) ?  15 : -15;
			
		// need to change $.getJSON to ajax since $.getJSON is a shortcut to $.ajax (double function call)
		// also need to to fix the 'assumed speed' since the page right now is waiting for get JSON to do anything
		// thinking about spinner.js
		$.getJSON(link, function(data) {
			$blogPosts.stop().animate({opacity: 0, marginLeft: 55-offset, marginRight: 0+offset}, speed, 'easeInOutCirc', function() {
				//each post
				for(var i=0; i < 5; i++) {
					var $post = $posts.eq(i);
					if(data[i]) {
						$post
							.find('h2').html(data[i].titel).end()
							.find('p').html(data[i].excerpt).end()
							.find('time').html(data[i].dutchdate).end()
							.attr('href', data[i].url);
					} else {
						$post
							.find('h2').html('').end()
							.find('p').html('').end()
							.find('time').html('');
					}
				}
				//the nav
				var nav = '';
				if(data.previousPage) nav += '<a href="' + data.jsonPrevious + '">&lt; oudere posts</a>';
				if(data.nextPage) nav += '<a href="' + data.jsonNext + '" class=right>nieuwere posts &#62;</a>';
				$blogNav.html(nav);
				$blogPosts.stop().animate({opacity: 1, marginLeft: 55, marginRight: 0}, speed, 'easeInOutCirc')
				oldBlogPage = page;
			});
		});
		
	}
	
	function postInit() {
		if(!isNumber(old)) {
			//basic init for a single post page
			
			globalPage = 'post';
			
			//menu
			initLavalamp(3);

			//sharing
			$('#share').bind('mouseenter', function() {
				$(this).addClass('loaded');
				Socialite.load($(this));	
			});
			
			//center WP images: http://mikevanrossum.nl/blog/2011/07/afbeeldingen-centreren-in-wordpress/
			$("p:has(.alignnone)")
				.add("p:has(.alignnone)")
				.add("p:has(.alignright)")
					.addClass("center");
			
			//tracking
			track.start(loc.pathname);

			//syntax hightlighting
			sh_highlightDocument($php.data('base') + "static/js/mylibs/shjs/", '.min.js');

			old = 1;
		}
	}
	
	function adminInit() {
		
		globalPage = 'admin';
		
		//for as long as the admin is public I want to track it to
		track.start(loc.pathname);
	}
	
	function initLavalamp(page) {
		if(isNumber(page)) $menu.find('li').eq(page).addClass('current');
		$menu.lavaLamp({ fx: "easeInOutCirc", speed: menuSpeed });
	}
	
});