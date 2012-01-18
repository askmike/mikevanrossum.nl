$(function() {
	
	var $slug = $('#slug'),
		$titel = $('#editTitle'),
		d = new Date(),
		str = d.getFullYear() + '/',
		//this function returns the current month -1 	(?)
		month = d.getMonth() + 1;
	
	
	//		first fix the blog display link	
	month = month.toString();
	//we want months like 09 instead of 9
	if(month.length == 1) month = '0' + month;
	str += month + '/';
	
	
	$('#slugLink').append(str);
	
	
	//		next auto update the slug
	$titel.keyup(function() {
		string_to_slug()
	});
	
	
	//this function ripped from http://dense13.com/blog/2009/05/03/converting-string-to-slug-javascript/
	function string_to_slug() {
	
	var str = $titel.val() ? $titel.val() : '';	
	
	str = str.replace(/^\s+|\s+$/g, ''); // trim
	str = str.toLowerCase();

	// remove accents, swap ñ for n, etc
	var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
	var to   = "aaaaeeeeiiiioooouuuunc------";
	for (var i=0, l=from.length ; i<l ; i++) {
		str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
	}

	str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
		.replace(/\s+/g, '-') // collapse whitespace and replace by -
		.replace(/-+/g, '-'); // collapse dashes

	$slug.val(str);
	
	}
});