<!doctype html>
<!--#  
by
__                
/'\_/`\  __/\ \               
 /\      \/\_\ \ \/'\      __   
  \ \ \__\ \/\ \ \ , <    /'__`\ 
   \ \ \_/\ \ \ \ \ \\`\ /\  __/ 
    \ \_\\ \_\ \_\ \_\ \_\ \____\
     \ /_/ \/_/\/_/\/_/\/_/\/____/

alot here is minified

Check out all the code on github [https://github.com/askmike/mikevanrossum.nl]

All is written by me except for:

 - jQuery 1.7.1 [http://jquery.com/]
 - menu: lavalamp 1.2 [http://www.gmarwaha.com/blog/2007/08/23/lavalamp-for-jquery-lovers/]
 - browser support: Modernizr 2.0 [http://modernizr.com/]
 - plugin: jQuery color function of jQuery UI 1.9pre [jqueryui.com]
 - syntax highlighting: shjs [http://shjs.sourceforge.net/]

-->
<html id="html" class="no-js <?= PAGE ?>" lang="nl">
<head>
	<meta charset="utf-8">

	<!-- Use the .htaccess and remove these lines to avoid edge case issues.
	More info: h5bp.com/b/378 -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Mike van Rossum - webdeveloper</title>
	<?php if(PAGE == 'site') { ?>
		<meta name="description" content="Op het portfolio en blog van Mike van Rossum, een webdeveloper en CMDA student uit Amsterdam, vind je van van alles wat te maken heeft met de front-end en back-end van websites."
	<?php } else { ?>
		<meta name="description" content="<?= $meta ?>">
		<meta name="keywords" content="Mike van Rossum, webdevelopment, website, webdesign, web, <?= $tags ?>">
	<?php } ?>
	<meta name="author" content="Mike van Rossum">

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

	<!-- CSS: implied media=all -->
	<!-- CSS concatenated and minified via ant build script-->
	<link rel=stylesheet href='<?php echo BASE; ?>static/css/style.css'>
	<!-- end CSS-->

  <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

  <!-- All JavaScript at the bottom, except for Modernizr / Respond.
       Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries
       For optimal performance, use a custom Modernizr build: www.modernizr.com/download/ -->
  <script src="<?php echo BASE ?>static/js/mylibs/custom-modernizr.js"></script>
</head>
<body>
	<header>
		<div id='header'>
			<h1 class='ir'>
				Mike van Rossum - webdeveloper
			</h1>
		</div>
	</header>
	<nav id="menu">
		<ul> 
		<?php if(PAGE == 'site') { ?>
			<li><a href="#">Home</a></li>
			<li><a href="#projects">Projects</a></li>
			<li><a href='#portfolio'>Portfolio</a></li>
			<li><a href="#blog">Blog</a></li>
		<?php } else { ?>
			<li><a href="<?= BASE ?>#">Home</a></li>
			<li><a href="<?= BASE ?>#projects">Projects</a></li>
			<li><a href='<?= BASE ?>#portfolio'>Portfolio</a></li>
			<li><a href="<?= BASE ?>#blog">Blog</a></li>
		<?php } ?>
		</ul> 
	</nav>
	<div id='container'>