/* Author: Mike van Rossum 

	This is the tracker script that is responsible for logging visits (on mikevanrossum.nl).

*/

$(function() {
	
	var	$window = $(window),
		$php = $('#php'),
	/*
		track holds all our tracking functions
	*/
		track = {
		/*
			the send function sends an object to my server using ajax
		*/
		send: function(obj) {

			// track to my server
			// I need to change $.post to ajax since $.post is basically a shortcut to $.ajax
			$.post($php.data('base') + "track/", obj /*,function(data) { $('html').html(data) }*/);
			
			// track to Google Analytics
			// this only works when the GA snippet has already run
			_gaq.push(['_trackPageview', obj.page]);
			
			// log(obj);
		},
		/*
			the start function tracks a new page load
		*/
		start: function(page) {
			
			var nav = navigator,
				scr = screen,

				obj = {
				type: 'track',
				phptime: $php.data('time'),
				session: $php.data('session'),
				referrer: document.referrer,
				page: page,
				platform: nav.platform,
				// maybe use this instead? https://github.com/ded/bowser
				// makes parsing browsers a whole lot easier
				browser: nav.userAgent,
				resolution: scr.width + 'x' + scr.height,
				viewport: $window.width() + 'x' + $window.height()
			};
			
			
			this.send(obj);
			
		},
		/*
			the page function tracks an ajax page switch
		*/
		page: function(page) {
			
			var obj = {
				type: 'step',
				page: page, 
				session: $php.data('session')
			};
			
			
			this.send(obj);
			
		},
	}
	
	//attach the track object to window, don't know a better way since I'm inside an anonymous function
	window.track = track;
});