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

everything here is minified (except this comment)

All is written by me except for:
lib: jQuery [http://jquery.com/]
menu: lavalamp [http://www.gmarwaha.com/blog/2007/08/23/lavalamp-for-jquery-lovers/]
tool: Modernizr [http://modernizr.com/]
-->
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lte IE 7]> <html id="html" class="no-js ie7 oldie" lang="nl"> <![endif]-->
<!--[if gt IE 7]> <html id="html" class="no-js ie8" lang="nl"> <![endif]-->
<!--[if !IE]><!--><html id="html" class="no-js" lang="nl"><!--<![endif]-->
<head>
	<meta charset="utf-8">

	<!-- Use the .htaccess and remove these lines to avoid edge case issues.
	More info: h5bp.com/b/378 -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Mike van Rossum - webdeveloper</title>
	<meta name="description" content="">
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
  <script src="<?php echo BASE; ?>static/js/libs/custom-modernizr.js"></script>
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
			<li><a href="#">Home</a></li>
			<li><a href="#projects">Projects</a></li>
			<li><a href='#portfolio'>Portfolio</a></li>
			<li><a href="#blog">Blog</a></li>
		</ul> 
	</nav>
	<div id='container'>
		<section class='page'>
			<h1>
				home	
			</h1>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nec risus 
				dolor, eget egestas ipsum. Ut tellus libero, scelerisque a porta sceler
				isque, gravida sed mi. Fusce mollis aliquet mauris id condimentum. Done
				c ullamcorper, nunc in accumsan mattis, turpis libero tincidunt ligula, 
				non convallis mauris felis in tellus. Quisque commodo turpis non ante 
				sollicitudin mattis. Maecenas placerat felis eget lectus pharetra cons
				equat. Vivamus porttitor sollicitudin elit at feugiat. Quisque nec met
				us sed est tincidunt egestas id id libero. Fusce mattis elementum tell
				us sit amet dignissim. Vestibulum ante nisi, interdum in dictum ut, ma
				ttis quis orci. Sed justo nunc, imperdiet congue mattis nec, eleifend
				 eget tellus. Maecenas ultricies iaculis luctus. Duis fermentum vesti
				bulum nulla in viverra.
			</p>
			<div class='a'>a</div>
			<div class='b'>b</div>
		</section>
		<section class='page'>
			<h1>
				Projects	
			</h1>
			<p>
				Hier komt een overzicht van alle projectjes waar ik me mee bezig houd.
			</p>
			<h2>
				Under Construction
			</h2>
		</section>
		<section class='page'>
			<h1>Portfolio</h1>
			<div>
				<div id='pleft'>
					<div class='hide'><a href='#portfolio/Visitekaartjes generator'></a><p>Visitekaartjes generator</p></div>
					<div class='hide'><a href='#portfolio/De tweede mediarevolutie'></a><p>De tweede mediarevolutie</p></div>
					<div class='hide'><a href='#portfolio/mijnrealiteit'></a><p>mijnrealiteit</p></div>
					<div class='hide'><a href='#portfolio/Minor Online Management'></a><p>Minor Online Management</p></div>
					<div class='hide'><a href='#portfolio/Hit the Blob'></a><p>Hit the Blob</p></div>
					<div class='hide'><a href='#portfolio/EK Bierkratten'></a><p>EK Bierkratten</p></div>
					<div class='hide'><a href='#portfolio/The Origin of Snow'></a><p>The Origin of Snow</p></div>
					<div class='hide'><a href='#portfolio/Let it snow!'></a><p>Let it snow!</p></div>
					<div class='hide'><a href='#portfolio/Looking behind'></a><p>Looking behind</p></div>
					<div class='hide'><a href='#portfolio/Grijze Gasten'></a><p>Grijze Gasten</p></div>
				</div>
				<div id='pright'>
					<div class="portfolio-item"></div>
				</div>
			</div>
		</section>
		<section class='page'>
			<h1>
				Blog	
			</h1>
			<div id='blog-posts'>
				
				<a href='#blog/1' class='blog-post'>
					<h3>
						Hello world!
					</h3>
					<time datetime='2011-12-30'>
						5 days ago
					</time>
					<p>
						Ik heb de laatste tijd al een aantal keer vragen over 
						jQuery gekregen. Om hier meer duidelijkheid over te 
						verschaffen ga ik een serie screencasts (video’s) opnemen 
						waarin ik uitleg hoe een aantal basis dingen werken. In mijn 
						eerste tutorial ga ik in op hoe je met een snelle pageload in 
						gedachte javascript kan koppelen [...]
					</p>
				</a>
				
				<a href='#blog/1' class='blog-post'>
					<h3>
						Hello world!
					</h3>
					<time datetime='2011-12-30'>
						5 days ago
					</time>
					<p>
						Ik heb de laatste tijd al een aantal keer vragen over 
						jQuery gekregen. Om hier meer duidelijkheid over te 
						verschaffen ga ik een serie screencasts (video’s) opnemen 
						waarin ik uitleg hoe een aantal basis dingen werken. In mijn 
						eerste tutorial ga ik in op hoe je met een snelle pageload in 
						gedachte javascript kan koppelen [...]
					</p>
				</a>
				
				<a href='#blog/1' class='blog-post'>
					<h3>
						Hello world!
					</h3>
					<time datetime='2011-12-30'>
						5 days ago
					</time>
					<p>
						Ik heb de laatste tijd al een aantal keer vragen over 
						jQuery gekregen. Om hier meer duidelijkheid over te 
						verschaffen ga ik een serie screencasts (video’s) opnemen 
						waarin ik uitleg hoe een aantal basis dingen werken. In mijn 
						eerste tutorial ga ik in op hoe je met een snelle pageload in 
						gedachte javascript kan koppelen [...]
					</p>
				</a>
				
				<a href='#blog/1' class='blog-post'>
					<h3>
						Hello world!
					</h3>
					<time datetime='2011-12-30'>
						5 days ago
					</time>
					<p>
						Ik heb de laatste tijd al een aantal keer vragen over 
						jQuery gekregen. Om hier meer duidelijkheid over te 
						verschaffen ga ik een serie screencasts (video’s) opnemen 
						waarin ik uitleg hoe een aantal basis dingen werken. In mijn 
						eerste tutorial ga ik in op hoe je met een snelle pageload in 
						gedachte javascript kan koppelen [...]
					</p>
				</a>
				
				<a href='#blog/1' class='blog-post'>
					<h3>
						Hello world!
					</h3>
					<time datetime='2011-12-30'>
						5 days ago
					</time>
					<p>
						Ik heb de laatste tijd al een aantal keer vragen over 
						jQuery gekregen. Om hier meer duidelijkheid over te 
						verschaffen ga ik een serie screencasts (video’s) opnemen 
						waarin ik uitleg hoe een aantal basis dingen werken. In mijn 
						eerste tutorial ga ik in op hoe je met een snelle pageload in 
						gedachte javascript kan koppelen [...]
					</p>
				</a>
				
			</div>
			<div id="blog-nav">
				<a href='#'>&#60; oudere posts</a>
				<a href='#'>nieuwere posts &#62;</a>
			</div>
		</section>
	</div>
	
	<div id='portfolio-items'>
		<div class="portfolio-item">
			<h3>
				Visitekaartjes generator
			</h3>
			<img src="<?php echo BASE; ?>static/img/visite.jpg" />
			<p class="portfolio-item-text">
				De eerste opdracht van PHP was redelijk simpel: maak een formulier die formulier input 10 keer weergeeft. 
				Ik ben echter met mijn oplossing een paar stappen verder gegaan
			</p>
			<p class="portfolio-item-text">
				<a target="_blank" href="http://vo0.nl/visitekaartjes">Genereer</a> 
				je eigen kaartje of check de code op 
				<a target="_blank" href="https://github.com/askmike/visitekaartjes">Github</a>.
			</p>
			<p class="portfolio-technieken">
				Technieken: HTML, JavaScript en jQuery<br />
				Datum: Oktober 2011
			</p>
		</div>

		<div class="portfolio-item">
			<h3>
				De tweede mediarevolutie
			</h3>
			<img src="<?php echo BASE; ?>static/img/dtr.jpg" />
			<p class="portfolio-item-text">
				Voor het vak cultuur en media moesten we 5 'dingen' op een schaal van modernistisch naar postmodernistisch ordenenen.
				We moesten dit zelf creatief uitwerken, ik heb voor een website gekozen
			</p>
			<p class="portfolio-item-text">
				<a target="_blank" href="http://vo0.nl/dtr">check het project</a> 
				online.
			</p>
			<p class="portfolio-technieken">
				Technieken: HTML, JavaScript en jQuery<br />
				Datum: Oktober 2011
			</p>
		</div>

		<div class="portfolio-item">
			<h3>
				mijnrealiteit
			</h3>
			<img src="<?php echo BASE; ?>static/img/mr.jpg" />
			<p class="portfolio-item-text">
				Ik heb voor mezelf een fotoblog gemaakt op basis van Wordpress (vanwege de native iPhone app voor wordpress) waar ik allemaal
				met mijn iPhone gemaakte foto's op zet.
			</p>
			<p class="portfolio-item-text">
				<a target="_blank" href="http://mijnrealiteit.nl">Mijnrealiteit</a> 
				staat online.
			</p>
			<p class="portfolio-technieken">
				Technieken: jQuery, XHTML, PHP en Wordpress<br />
				Datum: oktober 2011
			</p>
		</div>

		<div class="portfolio-item">
			<h3>
				Minor Online Management
			</h3>
			<img src="http://mikevanrossum.nl/wp-content/pictures/minor-online-management.png" />
			<p class="portfolio-item-text">
				De minor Online Management had behoefte aan een mobiele website die ze zelf kunnen beheren. 
				Dit heb ik voor ze gerealiseerd via jQuery Mobile en Wordpress.
			</p>
			<p class="portfolio-item-text">
				<a target="_blank" href="http://minoronlinemanagement.nl">De mobile website</a> 
				staat online.
			</p>
			<p class="portfolio-technieken">
				Technieken: jQuery, XHTML, PHP en Wordpress<br />
				Datum: mei 2011
			</p>
		</div>


		<div class="portfolio-item">
			<h3>
				Hit the Blob
			</h3>
			<img src="http://mikevanrossum.nl/wp-content/pictures/hit-the-blob.png" />
			<p class="portfolio-item-text">
				Op school hebben we in teamverband een flashgame gemaakt waar kinderen aan het einde van 
				de lagere school hun woordenschat mee verbeteren. In dit project was ik verantwoordelijk voor het
				programmeren in ActionScript, ook heb ik de website gemaakt.
			</p>
			<p class="portfolio-item-text">
				<a target="_blank" href="http://hittheblob.nl">Speel de game online</a> 
				en verbeter je highscore!
			</p>
			<p class="portfolio-technieken">
				Technieken: ActionScript 3, flash en XHTML<br />
				Datum: april 2011
			</p>
		</div>
		<div class="portfolio-item">
			<h3>
				EK Bierkratten
			</h3>
			<img src="http://mikevanrossum.nl/wp-content/pictures/ek-bierkratten.jpg" />
			<p class="portfolio-item-text">
				Voor het vak HCI (Human Computer Interaction) heb ik een website gedesignd  waar mensen bierflesjes kunnen customizen voor het EK.
				De kern van het vak gaat over interactie en niet over het design.
			</p>
			<p class="portfolio-item-text">
				Het resultaat heb ik via issuu.com 
				<a target="_blank" href="http://issuu.com/askmike/docs/final">online gezet</a>.
			</p>
			<p class="portfolio-technieken">
				Technieken: Photoshop<br />
				Datum: april 2011
			</p>
		</div> 
		
		<div class="portfolio-item">
			<h3>
				The Origin of Snow
			</h3>
			<img src="http://mikevanrossum.nl/wp-content/pictures/the-origin-of-snow.png" />
			<p class="portfolio-item-text">
				Tijdens het vak programmeren in Actionscript 3 werden we geintroduceerd aan programmeren. Dit is de eindopdracht die ik voor het
				vak heb ingeleverd.
			</p>
			<p class="portfolio-item-text">
				<a target="_blank" href="http://askmike.org/2011/01/deeltoets-3-origin-snow/">Op mijn blog</a> 
				kan je meerlezen over deze animatie.
			</p>
			<p class="portfolio-technieken">
				Technieken: Actionscript 3 en Flash Builder<br />
				Datum: januari 2011
			</p>
		</div> 
		<div class="portfolio-item">
			<h3>
				Let it snow!
			</h3>
			<img src="http://mikevanrossum.nl/wp-content/pictures/let-it-snow.png" />
			<p class="portfolio-item-text">
				Let it snow! was mijn eerste programma ooit geschreven. Dit was mijn eerste opdracht voor het vak programmeren in Actionscript 3.
			</p>
			<p class="portfolio-item-text">
				<a target="_blank" href="http://askmike.org/2010/12/programmeren-actionscript-3-deeltoets-1/">Op mijn blog</a> 
				kan je meerlezen over deze animatie.
			</p>
			<p class="portfolio-technieken">
				Technieken: Actionscript 3 en Flash Builder<br />
				Datum: december 2010
			</p>
		</div> 
		<div class="portfolio-item">
			
			<h3>
				Looking Behind
			</h3>
			<img src="http://mikevanrossum.nl/wp-content/pictures/looking-behind.png" />
			<p class="portfolio-item-text">
				Voor het vak internetstandaarden moest ik een website realiseren die de bezoeker door de geschiedenis van de media heen brengt.
			</p>
			<p class="portfolio-item-text">
				Hier kan je de <a rel="nofollow" target="_blank" href="http://askmike.org/lookingbehind">live website</a> 
				bekijken.
			</p>
			<p class="portfolio-technieken">
				Technieken: HTML, CSS en jQuery<br />
				Datum: oktober 2010
			</p>
		</div> 
		<div class="portfolio-item">
			
			<h3>
				Grijze Gasten
			</h3>
			<img src="http://mikevanrossum.nl/wp-content/pictures/grijze-gasten.png" />
			<p class="portfolio-item-text">
				Tijdens het introductie project van mijn studie Interactieve Media, moesten 
				we een kort filmpje maken in Amsterdam, wij hebben gekozen voor de filmvorm stopmotion.	
			</p>
			<p class="portfolio-item-text">
				Bekijk hier het resultaat 
				<a rel="nofollow" target="_blank" href="http://www.youtube.com/watch?v=G1UKNg5Qhb8">in een youtube filmpje</a>.
			</p>
			<p class="portfolio-technieken">
				Technieken: Fotografie en Photoshop<br />
				Datum: september 2010
			</p>
		</div>
	</div>
	<!-- JavaScript at the bottom for fast page loading -->

	<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo BASE; ?>static/js/libs/jquery-1.7.1.min.js"><\/script>')</script>


	<!-- scripts concatenated and minified via ant build script-->
	<script defer src="<?php echo BASE; ?>static/js/plugins.js"></script>
	<script defer src="<?php echo BASE; ?>static/js/script.js"></script>
	<!-- end scripts-->


	<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
	chromium.org/developers/how-tos/chrome-frame-getting-started -->
	<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
	<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->

</body>
</html>