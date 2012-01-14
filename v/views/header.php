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

Javascript:

 - jQuery 1.7.1 [http://jquery.com/]
 - menu: lavalamp 1.2 [http://www.gmarwaha.com/blog/2007/08/23/lavalamp-for-jquery-lovers/]
 - browser support: Modernizr 2.0 [http://modernizr.com/]
 - plugin: jQuery color function of jQuery UI 1.9pre [jqueryui.com]
 - syntax highlighting: shjs [http://shjs.sourceforge.net/]
 - AJAX social media buttons: socialite.js [http://socialitejs.com/]

PHP:

 - PHP Markdown 1.0.1o [http://michelf.com/projects/php-markdown/]
 - PHP SmartyPants [http://michelf.com/projects/php-smartypants/]

-->
<html id="html" class="no-js <?= PAGE ?>" lang=nl>
<head>
	<meta charset=utf-8>

	
	<meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">

	<?php if(PAGE == 'site') { ?>
		<title>Mike van Rossum - webdeveloper</title>
		<meta name="description" content="Op het portfolio en blog van Mike van Rossum, een webdeveloper en CMDA student uit Amsterdam, vind je van van alles wat te maken heeft met de front-end en back-end van websites."
	<?php } else { ?>
		<title><?= $titel ?></title>
		<meta name="description" content="<?= $meta ?>">
		<meta name="keywords" content="Mike van Rossum, webdevelopment, website, webdesign, web, <?= $tags ?>">
	<?php } ?>
	<meta name=author content="Mike van Rossum">

	

	
	<link rel=stylesheet href='<?php echo BASE ?>static/css/9a975545b61848d37441000a99c051116441a686.css'>

  

  
  <script src="<?php echo BASE ?>static/js/mylibs/custom-modernizr.js"></script>
</head>
<body>
	<header>
		<div id=header>
			<h1>
				<a class='ir' href='<?= BASE ?>'>
					Mike van Rossum - webdeveloper
				</a>
			</h1>
		</div>
	</header>
	<nav id=menu>
		<ul> 
		<?php if(PAGE == 'site') { ?>
			<li><a href="#">Home</a></li>
			<li><a href="#projects">Projects</a></li>
			<li><a href='#portfolio'>Portfolio</a></li>
			<li><a href="#blog">Blog</a></li>
		<?php } else if(PAGE == 'admin') { ?>
			<li><a href="<?= BASE ?>admin/analytics/">Analytics</a></li>
			<li><a href="<?= BASE ?>admin/portfolio/">Portfolio</a></li>
			<li><a href='<?= BASE ?>admin/'>Blog</a></li>	
		<?php } else { ?>
			<li><a href="<?= BASE ?>#">Home</a></li>
			<li><a href="<?= BASE ?>#projects">Projects</a></li>
			<li><a href='<?= BASE ?>#portfolio'>Portfolio</a></li>
			<li><a href="<?= BASE ?>#blog">Blog</a></li>
		<?php } ?>
		</ul> 
	</nav>
	<div id=container>