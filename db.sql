-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 08, 2012 at 05:00 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `mvr`
--

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `date` int(11) NOT NULL,
  `tech` text NOT NULL,
  `body-html` text NOT NULL,
  `body-md` text NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `name`, `date`, `tech`, `body-html`, `body-md`, `image`) VALUES
(1, 'Grijze Gasten', 1284145265, 'Fotografie en Photoshop', '<p class="portfolio-item-text">\r\n				Tijdens het introductie project van mijn studie Interactieve Media, moesten \r\n				we een kort filmpje maken in Amsterdam, wij hebben gekozen voor de filmvorm stopmotion.	\r\n			</p>\r\n			<p class="portfolio-item-text">\r\n				Bekijk hier het resultaat \r\n				<a rel="nofollow" target="_blank" href="http://www.youtube.com/watch?v=G1UKNg5Qhb8">in een youtube filmpje</a>.\r\n			</p>', '', 'grijze-gasten.png'),
(2, 'Looking Behind', 1286737265, 'HTML, CSS en jQuery', '<p class="portfolio-item-text">\r\n				Voor het vak internetstandaarden moest ik een website realiseren die de bezoeker door de geschiedenis van de media heen brengt.\r\n			</p>\r\n			<p class="portfolio-item-text">\r\n				Hier kan je de <a rel="nofollow" target="_blank" href="http://askmike.org/lookingbehind">live website</a> \r\n				bekijken.\r\n			</p>', '', 'looking-behind.png'),
(3, 'Let it snow!', 1292011265, 'Actionscript 3 en Flash Builder', '<p class="portfolio-item-text">\r\n				Let it snow! was mijn eerste programma ooit geschreven. Dit was mijn eerste opdracht voor het vak programmeren in Actionscript 3.\r\n			</p>\r\n			<p class="portfolio-item-text">\r\n				<a target="_blank" href="http://askmike.org/2010/12/programmeren-actionscript-3-deeltoets-1/">Op mijn blog</a> \r\n				kan je meerlezen over deze animatie.\r\n			</p>', '', 'let-it-snow.png'),
(4, 'The Origin of Snow', 1294689665, 'Actionscript 3 en Flash Builder', '<p class="portfolio-item-text">\r\n				Tijdens het vak programmeren in Actionscript 3 werden we geintroduceerd aan programmeren. Dit is de eindopdracht die ik voor het\r\n				vak heb ingeleverd.\r\n			</p>\r\n			<p class="portfolio-item-text">\r\n				<a target="_blank" href="http://askmike.org/2011/01/deeltoets-3-origin-snow/">Op mijn blog</a> \r\n				kan je meerlezen over deze animatie.\r\n			</p>', '', 'the-origin-of-snow.png'),
(5, 'EK Bierkratten', 1302462065, 'Photoshop', '<p class="portfolio-item-text">\r\n				Voor het vak HCI (Human Computer Interaction) heb ik een website gedesignd  waar mensen bierflesjes kunnen customizen voor het EK.\r\n				De kern van het vak gaat over interactie en niet over het design.\r\n			</p>\r\n			<p class="portfolio-item-text">\r\n				Het resultaat heb ik via issuu.com \r\n				<a target="_blank" href="http://issuu.com/askmike/docs/final">online gezet</a>.\r\n			</p>', '', 'ek-bierkratten.jpg'),
(6, 'Hit the Blob', 1305054065, 'ActionScript 3, flash en XHTML', '<p class="portfolio-item-text">\r\n				Op school hebben we in teamverband een flashgame gemaakt waar kinderen aan het einde van \r\n				de lagere school hun woordenschat mee verbeteren. In dit project was ik verantwoordelijk voor het\r\n				programmeren in ActionScript, ook heb ik de website gemaakt.\r\n			</p>\r\n			<p class="portfolio-item-text">\r\n				<a target="_blank" href="http://hittheblob.nl">Speel de game online</a> \r\n				en verbeter je highscore!\r\n			</p>', '', 'hit-the-blob.png'),
(7, 'Minor Online Management', 1305140465, 'jQuery, XHTML, PHP en Wordpress', '<p class="portfolio-item-text">\r\n				De minor Online Management had behoefte aan een mobiele website die ze zelf kunnen beheren. \r\n				Dit heb ik voor ze gerealiseerd via jQuery Mobile en Wordpress.\r\n			</p>\r\n			<p class="portfolio-item-text">\r\n				<a target="_blank" href="http://minoronlinemanagement.nl">De mobile website</a> \r\n				staat online.\r\n			</p>', '', 'minor-online-management.png'),
(8, 'mijnrealiteit', 1318359665, 'jQuery, XHTML, PHP en Wordpress', '<p class="portfolio-item-text">\r\n				Ik heb voor mezelf een fotoblog gemaakt op basis van Wordpress (vanwege de native iPhone app voor wordpress) waar ik allemaal\r\n				met mijn iPhone gemaakte foto''s op zet.\r\n			</p>\r\n			<p class="portfolio-item-text">\r\n				<a target="_blank" href="http://mijnrealiteit.nl">Mijnrealiteit</a> \r\n				staat online.\r\n			</p>', '', 'mr.jpg'),
(9, 'De tweede mediarevolutie', 1318446065, 'HTML, JavaScript en jQuery', '<p class="portfolio-item-text">\r\n				Voor het vak cultuur en media moesten we 5 ''dingen'' op een schaal van modernistisch naar postmodernistisch ordenenen.\r\n				We moesten dit zelf creatief uitwerken, ik heb voor een website gekozen\r\n			</p>\r\n			<p class="portfolio-item-text">\r\n				<a target="_blank" href="http://vo0.nl/dtr">check het project</a> \r\n				online.\r\n			</p>', '', 'dtr.jpg'),
(10, 'Visitekaartjes generator', 1318618865, 'HTML, JavaScript en jQuery', '<p class="portfolio-item-text">\r\n				De eerste opdracht van PHP was redelijk simpel: maak een formulier die formulier input 10 keer weergeeft. \r\n				Ik ben echter met mijn oplossing een paar stappen verder gegaan\r\n			</p>\r\n			<p class="portfolio-item-text">\r\n				<a target="_blank" href="http://vo0.nl/visitekaartjes">Genereer</a> \r\n				je eigen kaartje of check de code op \r\n				<a target="_blank" href="https://github.com/askmike/visitekaartjes">Github</a>.\r\n			</p>', '', 'visite.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titel` text NOT NULL,
  `body-html` text NOT NULL,
  `body-md` text NOT NULL,
  `meta` text NOT NULL,
  `tags` text NOT NULL,
  `date` int(11) NOT NULL,
  `url` text NOT NULL,
  `modify-date` int(11) NOT NULL,
  `excerpt` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `titel`, `body-html`, `body-md`, `meta`, `tags`, `date`, `url`, `modify-date`, `excerpt`) VALUES
(1, 'Animeer kleuren via jQuery', '<p>Als je veel met jQuery werkt sta je soms versteld als je erachter komt dat er dingen zijn die niet standaard mogelijk zijn met de uitgebreide javascript library. Zo liep ik gister tegen het probleem dat ik kleuren wou animeren via jQuery maar dit standaard niet mogelijk is. </p>\r\n\r\n<p>Als uitbreiding op jQuery kan je jQuery UI integreren in je website, maar ik vond hem nogal groot en lomp. Helemaal als je hem puur inlaadt voor de kleuranimatie''s. </p>\r\n\r\n<p>Hier is de <a href="https://github.com/jquery/jquery-color">jQuery color plugin</a> van een aantal developers die erg betrokken zijn bij jQuery. Ook al is de enige functionaliteit van de plugin kleuren animaren, hij is alsnog best groot. Hij biedt allemaal extra functionaliteit die soms handig kan zijn, maar in mijn geval alsnog overbodig was.</p>\r\n\r\n<p>Na wat zoeken vond ik op <a href="http://stackoverflow.com/questions/190560/jquery-animate-backgroundcolor#answer-6993089">stackoverflow</a> een oplossing die perfect leek. Je ript gewoon de kleuren functie uit jQuery UI en je hebt een perfecte oplossing. Helaas kon ik dit op deze manier niet werkend krijgen: in de functie wordt namelijk een aantal keer verwezen naar een colors array die niet mee geript was. Hier is de functie zodanig dat hij bij mij wel werkt:</p>\r\n\r\n<pre class="sh_javascript">\r\n/* stripped from jquery UI 1.9pre\r\n/******************************************************************************/\r\n/****************************** COLOR ANIMATIONS ******************************/\r\n/******************************************************************************/\r\n// override the animation for color styles\r\n$.each(["backgroundColor", "borderBottomColor", "borderLeftColor",\r\n    "borderRightColor", "borderTopColor", "borderColor", "color", "outlineColor"],\r\nfunction(i, attr) {\r\n    $.fx.step[attr] = function(fx) {\r\n        if (!fx.colorInit) {\r\n            fx.start = getColor(fx.elem, attr);\r\n            fx.end = getRGB(fx.end);\r\n            fx.colorInit = true;\r\n        }\r\n\r\n        fx.elem.style[attr] = "rgb(" +\r\n            Math.max(Math.min(parseInt((fx.pos * (fx.end[0] - fx.start[0])) + fx.start[0], 10), 255), 0) + "," +\r\n            Math.max(Math.min(parseInt((fx.pos * (fx.end[1] - fx.start[1])) + fx.start[1], 10), 255), 0) + "," +\r\n            Math.max(Math.min(parseInt((fx.pos * (fx.end[2] - fx.start[2])) + fx.start[2], 10), 255), 0) + ")";\r\n    };\r\n});\r\n\r\n// Color Conversion functions from highlightFade\r\n// By Blair Mitchelmore\r\n// http://jquery.offput.ca/highlightFade/\r\n\r\n// Parse strings looking for color tuples [255,255,255]\r\nfunction getRGB(color) {\r\n        var result;\r\n\r\n        // Check if we''re already dealing with an array of colors\r\n        if ( color && color.constructor === Array && color.length === 3 )\r\n                return color;\r\n\r\n        // Look for rgb(num,num,num)\r\n        if (result = /rgb\\(\\s*([0-9]{1,3})\\s*,\\s*([0-9]{1,3})\\s*,\\s*([0-9]{1,3})\\s*\\)/.exec(color))\r\n                return [parseInt(result[1],10), parseInt(result[2],10), parseInt(result[3],10)];\r\n\r\n        // Look for rgb(num%,num%,num%)\r\n        if (result = /rgb\\(\\s*([0-9]+(?:\\.[0-9]+)?)\\%\\s*,\\s*([0-9]+(?:\\.[0-9]+)?)\\%\\s*,\\s*([0-9]+(?:\\.[0-9]+)?)\\%\\s*\\)/.exec(color))\r\n                return [parseFloat(result[1])*2.55, parseFloat(result[2])*2.55, parseFloat(result[3])*2.55];\r\n\r\n        // Look for #a0b1c2\r\n        if (result = /#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(color))\r\n                return [parseInt(result[1],16), parseInt(result[2],16), parseInt(result[3],16)];\r\n\r\n        // Look for #fff\r\n        if (result = /#([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/.exec(color))\r\n                return [parseInt(result[1]+result[1],16), parseInt(result[2]+result[2],16), parseInt(result[3]+result[3],16)];\r\n\r\n        // Look for rgba(0, 0, 0, 0) == transparent in Safari 3\r\n        if (result = /rgba\\(0, 0, 0, 0\\)/.exec(color))\r\n                return colors["transparent"];\r\n\r\n        // Otherwise, we''re most likely dealing with a named color\r\n        return colors[$.trim(color).toLowerCase()];\r\n}\r\n\r\nfunction getColor(elem, attr) {\r\n        var color;\r\n\r\n        do {\r\n                color = $.curCSS(elem, attr);\r\n\r\n                // Keep going until we find an element that has color, or we hit the body\r\n                if ( color != "" && color !== "transparent" || $.nodeName(elem, "body") )\r\n                        break;\r\n\r\n                attr = "backgroundColor";\r\n        } while ( elem = elem.parentNode );\r\n\r\n        return getRGB(color);\r\n};\r\n\r\n// Some named colors to work with\r\n// From Interface by Stefan Petre\r\n// http://interface.eyecon.ro/\r\n\r\nvar colors = {\r\n    black:[0,0,0],\r\n    blue:[0,0,255],\r\n    green:[0,128,0],\r\n    red:[255,0,0],\r\n    white:[255,255,255],\r\n    yellow:[255,255,0],\r\n    transparent: [255,255,255]\r\n};</pre>\r\n\r\n<p>Als je deze functie na jQuery inlaadt (hij past jQuery aan) en voor je eigen script kan je kleuren ook animeren.</p>\r\n\r\n<p>Hieronder is een voorbeeld waar ik de achtergrond kleur animeer on hover (ik gebruik de <a href="http://api.jquery.com/on/">.on</a> functie in plaats van hover omdat er in mijn geval dynamisch content wordt ingeladen nadat dit script wordt uitgevoerd).</p>\r\n\r\n<pre class="sh_javascript">if(!Modernizr.csstransitions) {\r\n    $(''#blog-posts'').children()\r\n        .on(''mouseenter'', { color: ''#eeeeee'' }, fadeBg)\r\n        .on(''mouseleave'', { color: ''#ffffff'' }, fadeBg);\r\n}\r\n\r\nfunction fadeBg(e) {\r\n    $(this).stop().animate({ backgroundColor: e.data.color }, 400 );\r\n}</pre>\r\n\r\n<p>Zoals je ziet is er een if die checkt of een bepaalde waarde juist is of niet. In mijn geval wil ik een achtergrond animeren on hover, dit kan ik ook doen met CSS3. Ik gebruik <a href="http://modernizr.com/">modernizr</a> om te checken of de browser de CSS3 eigenschap transition ondersteund, als de browser het ondersteund wordt de klasse .csstransitions aan mijn html tag toegevoegd en wordt bovenstaande boolean in de if check op true gezet.</p>\r\n\r\n<p>Als de browser de eigenschap ondersteund doe ik de animatie via css:</p>\r\n\r\n<pre class="sh_css">.csstransitions #blog-posts a.blog-post {\r\n    background-color:#ffffff;\r\n    moz-transition: background-color .4s;\r\n    -webkit-transition:background-color .4s;\r\n    -o-transition: background-color .4s;\r\n    -ms-transition: background-color .4s;\r\n    transition: background-color .4s;\r\n}\r\n\r\n.csstransitions #blog-posts a.blog-post:hover {\r\n    background-color:#eeeeee;\r\n}</pre>\r\n\r\n<p><strong>Note</strong>:\r\nOp het moment van schrijven is er een bug in chrome die ervoor zorgt dat animeren via CSS3 niet werkt zodra je de link al bezocht heb. Zie deze <a href="http://code.google.com/p/chromium/issues/detail?id=101245&amp;q=visited%20transition&amp;colspec=ID%20Pri%20Mstone%20ReleaseBlock%20Area%20Feature%20Status%20Owner%20Summary">twee</a> <a href="http://code.google.com/p/chromium/issues/detail?id=103354&amp;q=area%3DWebKit%20transition&amp;sort=-id&amp;colspec=ID%20Pri%20Mstone%20ReleaseBlock%20Area%20Feature%20Status%20Owner%20Summary">bugs</a>.</p>', 'Als je veel met jQuery werkt sta je soms versteld als je erachter komt dat er dingen zijn die niet standaard mogelijk zijn met de uitgebreide javascript library. Zo liep ik gister tegen het probleem dat ik kleuren wou animeren via jQuery maar dit standaard niet mogelijk is. \r\n\r\nAls uitbreiding op jQuery kan je jQuery UI integreren in je website, maar ik vond hem nogal groot en lomp. Helemaal als je hem puur inlaadt voor de kleuranimatie''s. \r\n\r\nHier is de <a href="https://github.com/jquery/jquery-color">jQuery color plugin</a> van een aantal developers die erg betrokken zijn bij jQuery. Ook al is de enige functionaliteit van de plugin kleuren animaren, hij is alsnog best groot. Hij biedt allemaal extra functionaliteit die soms handig kan zijn, maar in mijn geval alsnog overbodig was.\r\n\r\nNa wat zoeken vond ik op <a href="http://stackoverflow.com/questions/190560/jquery-animate-backgroundcolor#answer-6993089">stackoverflow</a> een oplossing die perfect leek. Je ript gewoon de kleuren functie uit jQuery UI en je hebt een perfecte oplossing. Helaas kon ik dit op deze manier niet werkend krijgen: in de functie wordt namelijk een aantal keer verwezen naar een colors array die niet mee geript was. Hier is de functie zodanig dat hij bij mij wel werkt:\r\n\r\n<pre class="sh_javascript">\r\n/* stripped from jquery UI 1.9pre\r\n/******************************************************************************/\r\n/****************************** COLOR ANIMATIONS ******************************/\r\n/******************************************************************************/\r\n// override the animation for color styles\r\n$.each(["backgroundColor", "borderBottomColor", "borderLeftColor",\r\n	"borderRightColor", "borderTopColor", "borderColor", "color", "outlineColor"],\r\nfunction(i, attr) {\r\n	$.fx.step[attr] = function(fx) {\r\n		if (!fx.colorInit) {\r\n			fx.start = getColor(fx.elem, attr);\r\n			fx.end = getRGB(fx.end);\r\n			fx.colorInit = true;\r\n		}\r\n\r\n		fx.elem.style[attr] = "rgb(" +\r\n			Math.max(Math.min(parseInt((fx.pos * (fx.end[0] - fx.start[0])) + fx.start[0], 10), 255), 0) + "," +\r\n			Math.max(Math.min(parseInt((fx.pos * (fx.end[1] - fx.start[1])) + fx.start[1], 10), 255), 0) + "," +\r\n			Math.max(Math.min(parseInt((fx.pos * (fx.end[2] - fx.start[2])) + fx.start[2], 10), 255), 0) + ")";\r\n	};\r\n});\r\n\r\n// Color Conversion functions from highlightFade\r\n// By Blair Mitchelmore\r\n// http://jquery.offput.ca/highlightFade/\r\n\r\n// Parse strings looking for color tuples [255,255,255]\r\nfunction getRGB(color) {\r\n		var result;\r\n\r\n		// Check if we''re already dealing with an array of colors\r\n		if ( color && color.constructor === Array && color.length === 3 )\r\n				return color;\r\n\r\n		// Look for rgb(num,num,num)\r\n		if (result = /rgb\\(\\s*([0-9]{1,3})\\s*,\\s*([0-9]{1,3})\\s*,\\s*([0-9]{1,3})\\s*\\)/.exec(color))\r\n				return [parseInt(result[1],10), parseInt(result[2],10), parseInt(result[3],10)];\r\n\r\n		// Look for rgb(num%,num%,num%)\r\n		if (result = /rgb\\(\\s*([0-9]+(?:\\.[0-9]+)?)\\%\\s*,\\s*([0-9]+(?:\\.[0-9]+)?)\\%\\s*,\\s*([0-9]+(?:\\.[0-9]+)?)\\%\\s*\\)/.exec(color))\r\n				return [parseFloat(result[1])*2.55, parseFloat(result[2])*2.55, parseFloat(result[3])*2.55];\r\n\r\n		// Look for #a0b1c2\r\n		if (result = /#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(color))\r\n				return [parseInt(result[1],16), parseInt(result[2],16), parseInt(result[3],16)];\r\n\r\n		// Look for #fff\r\n		if (result = /#([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/.exec(color))\r\n				return [parseInt(result[1]+result[1],16), parseInt(result[2]+result[2],16), parseInt(result[3]+result[3],16)];\r\n\r\n		// Look for rgba(0, 0, 0, 0) == transparent in Safari 3\r\n		if (result = /rgba\\(0, 0, 0, 0\\)/.exec(color))\r\n				return colors["transparent"];\r\n\r\n		// Otherwise, we''re most likely dealing with a named color\r\n		return colors[$.trim(color).toLowerCase()];\r\n}\r\n\r\nfunction getColor(elem, attr) {\r\n		var color;\r\n\r\n		do {\r\n				color = $.curCSS(elem, attr);\r\n\r\n				// Keep going until we find an element that has color, or we hit the body\r\n				if ( color != "" && color !== "transparent" || $.nodeName(elem, "body") )\r\n						break;\r\n\r\n				attr = "backgroundColor";\r\n		} while ( elem = elem.parentNode );\r\n\r\n		return getRGB(color);\r\n};\r\n\r\n// Some named colors to work with\r\n// From Interface by Stefan Petre\r\n// http://interface.eyecon.ro/\r\n\r\nvar colors = {\r\n	black:[0,0,0],\r\n	blue:[0,0,255],\r\n	green:[0,128,0],\r\n	red:[255,0,0],\r\n	white:[255,255,255],\r\n	yellow:[255,255,0],\r\n	transparent: [255,255,255]\r\n};</pre>\r\n\r\nAls je deze functie na jQuery inlaadt (hij past jQuery aan) en voor je eigen script kan je kleuren ook animeren.\r\n\r\nHieronder is een voorbeeld waar ik de achtergrond kleur animeer on hover (ik gebruik de <a href="http://api.jquery.com/on/">.on</a> functie in plaats van hover omdat er in mijn geval dynamisch content wordt ingeladen nadat dit script wordt uitgevoerd).\r\n\r\n<pre class="sh_javascript">if(!Modernizr.csstransitions) {\r\n	$(''#blog-posts'').children()\r\n		.on(''mouseenter'', { color: ''#eeeeee'' }, fadeBg)\r\n		.on(''mouseleave'', { color: ''#ffffff'' }, fadeBg);\r\n}\r\n	\r\nfunction fadeBg(e) {\r\n	$(this).stop().animate({ backgroundColor: e.data.color }, 400 );\r\n}</pre>\r\n\r\nZoals je ziet is er een if die checkt of een bepaalde waarde juist is of niet. In mijn geval wil ik een achtergrond animeren on hover, dit kan ik ook doen met CSS3. Ik gebruik <a href="http://modernizr.com/">modernizr</a> om te checken of de browser de CSS3 eigenschap transition ondersteund, als de browser het ondersteund wordt de klasse .csstransitions aan mijn html tag toegevoegd en wordt bovenstaande boolean in de if check op true gezet.\r\n\r\nAls de browser de eigenschap ondersteund doe ik de animatie via css:\r\n<pre class="sh_css">.csstransitions #blog-posts a.blog-post {\r\n	background-color:#ffffff;\r\n	moz-transition: background-color .4s;\r\n	-webkit-transition:background-color .4s;\r\n	-o-transition: background-color .4s;\r\n	-ms-transition: background-color .4s;\r\n	transition: background-color .4s;\r\n}\r\n\r\n.csstransitions #blog-posts a.blog-post:hover {\r\n	background-color:#eeeeee;\r\n}</pre>\r\n\r\n<strong>Note</strong>:\r\nOp het moment van schrijven is er een bug in chrome die ervoor zorgt dat animeren via CSS3 niet werkt zodra je de link al bezocht heb. Zie deze <a href="http://code.google.com/p/chromium/issues/detail?id=101245&q=visited%20transition&colspec=ID%20Pri%20Mstone%20ReleaseBlock%20Area%20Feature%20Status%20Owner%20Summary">twee</a> <a href="http://code.google.com/p/chromium/issues/detail?id=103354&q=area%3DWebKit%20transition&sort=-id&colspec=ID%20Pri%20Mstone%20ReleaseBlock%20Area%20Feature%20Status%20Owner%20Summary">bugs</a>.', '', '', 1325604134, 'blog/2012/01/animeer-kleuren-via-jquery/', 0, 'Als je veel met jQuery werkt sta je soms versteld als je erachter komt dat er dingen zijn die niet standaard mogelijk zijn met de uitgebreide javascript library. Zo liep ik gister tegen het probleem dat ik kleuren wou animeren via jQuery maar dit standaard niet mogelijk is. Als uitbreiding op jQuery kan je jQuery [...]'),
(2, 'Houdt de snelheid van je PHP scripts bij', '<p>Ik vroeg me af hoeveel impact een bepaalde PHP functie op de rendertijd van de output had. Een makkelijke manier om hierachter te komen is om bij te houden hoelaat PHP begint aan je script en hoelaat hij eindigt. Echo het verschil en je weet precies hoe lang je moet wachten tot dat de server je pagina uitspuugt.</p>\r\n\r\n<p>Houdt er rekening mee dat de klok pas begint met lopen zodra de server de request heeft ontvangen (wat altijd later is dan wanneer je een verzoek doet tot de pagina vanaf een browser ivm. het internet). Ook stopt de klok <em>al</em> zodra de server klaar is, hierna moet de webpagina nog verstuurd worden naar de client. </p>\r\n\r\n<pre class=''sh_php''>//helemaal aan het begin van je script zet je dit\r\n$startTime = microtime(true)\r\n\r\n...\r\n\r\n//aan het einde van je html pagina die je gaat versturen zet je dit:\r\n&lt;!-- &lt;?= round((microtime(true) - $startTime)*1000, 4) . '' miliseconds'' ?&#62; --&#62;</pre>\r\n\r\n<p>Nu kan je in je broncode van je html onderaan vinden hoelang de pagina ermee bezig was, iets in deze trend:</p>\r\n\r\n<pre class=''sh_html''>&lt;!-- 4.8141 miliseconds --&gt;</pre>\r\n\r\n<p>Ik kwam er al snel achter dat als je PHP in combinatie met SQL gebruikt (wat je altijd doet als je data op wilt slaan) er geen pijl meer op te trekken is hoelang de pagina erover doet.</p>\r\n', 'Ik vroeg me af hoeveel impact een bepaalde PHP functie op de rendertijd van de output had. Een makkelijke manier om hierachter te komen is om bij te houden hoelaat PHP begint aan je script en hoelaat hij eindigt. Echo het verschil en je weet precies hoe lang je moet wachten tot dat de server je pagina uitspuugt.\r\n\r\nHoudt er rekening mee dat de klok pas begint met lopen zodra de server de request heeft ontvangen (wat altijd later is dan wanneer je een verzoek doet tot de pagina vanaf een browser ivm. het internet). Ook stopt de klok <em>al</em> zodra de server klaar is, hierna moet de webpagina nog verstuurd worden naar de client. \r\n\r\n<pre class=''sh_php''>//helemaal aan het begin van je script zet je dit\r\n$startTime = microtime(true)\r\n\r\n...\r\n\r\n//aan het einde van je html pagina die je gaat versturen zet je dit:\r\n&lt;!-- &lt;?= round((microtime(true) - $startTime)*1000, 4) . '' miliseconds'' ?&#62; --&#62;</pre>\r\n\r\nNu kan je in je broncode van je html onderaan vinden hoelang de pagina ermee bezig was, iets in deze trend:\r\n\r\n<pre class=''sh_html''>&lt;!-- 4.8141 miliseconds --&gt;</pre>\r\n\r\nIk kwam er al snel achter dat als je PHP in combinatie met SQL gebruikt (wat je altijd doet als je data op wilt slaan) er geen pijl meer op te trekken is hoelang de pagina erover doet.', '', '', 1325863334, 'blog/2012/01/houdt-de-snelheid-van-je-php-scripts-bij', 0, 'Ik vroeg me af hoeveel impact een bepaalde PHP functie op de rendertijd van de output had. Een makkelijke manier om hierachter te komen is om bij te houden hoelaat PHP begint aan je script en hoelaat hij eindigt. Echo het verschil en je weet precies hoe lang je moet wachten tot dat de server je pagina uitspuugt.[...]');

-- --------------------------------------------------------

--
-- Table structure for table `step`
--

CREATE TABLE IF NOT EXISTS `step` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trackingID` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `page` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `step`
--

INSERT INTO `step` (`id`, `trackingID`, `time`, `page`) VALUES
(10, 114, 1326041967, 'projects'),
(9, 114, 1326041966, 'home'),
(8, 114, 1326041896, 'home'),
(7, 114, 1326041893, 'blog'),
(6, 114, 1326041867, 'portfolio'),
(11, 114, 1326041968, 'portfolio'),
(12, 114, 1326041969, 'blog'),
(13, 114, 1326041969, 'projects'),
(14, 114, 1326042014, 'home'),
(15, 114, 1326042016, 'home');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE IF NOT EXISTS `tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phpsession` text NOT NULL,
  `phptime` decimal(10,0) NOT NULL,
  `referrer` text NOT NULL,
  `platform` text NOT NULL,
  `browser` text NOT NULL,
  `resolution` text NOT NULL,
  `viewport` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=115 ;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`id`, `phpsession`, `phptime`, `referrer`, `platform`, `browser`, `resolution`, `viewport`) VALUES
(114, '90f579d9f04f95a72d67fa4027c31e3d', 9, '', 'MacIntel', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_8) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.63 Safari/535.7', '1440x900', '1192x673');
