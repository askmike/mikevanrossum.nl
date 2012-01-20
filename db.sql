-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 20, 2012 at 12:13 PM
-- Server version: 5.1.60
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=90 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4413 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=523 ;

-- --------------------------------------------------------

--
-- Table structure for table `tweet`
--

CREATE TABLE IF NOT EXISTS `tweet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fid` text NOT NULL,
  `date` int(11) NOT NULL,
  `raw` text NOT NULL,
  `html` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=293 ;
