-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 04, 2012 at 12:40 PM
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `post`
--

