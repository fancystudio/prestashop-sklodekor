<?php

	// Init
	$sql = array();
	
	$sql[] = "CREATE TABLE IF NOT EXISTS `"._DB_PREFIX_."mailing_track` (
						  `ID` int(5) NOT NULL PRIMARY KEY auto_increment,
						  `ipAddress` varchar(12) NOT NULL default '',
						  `id_campaign` varchar(5) NOT NULL default '0',
						  `subject` varchar(255) NOT NULL default '0',
						  `postDate` varchar(10) NOT NULL default '',
						  `postTime` varchar(8) NOT NULL default '',
						  `email` varchar(128) NOT NULL default ''
						) ENGINE="._MYSQL_ENGINE_." DEFAULT CHARSET=utf8";
	
	
	
	$sql[] = "CREATE TABLE IF NOT EXISTS `"._DB_PREFIX_."mailing_history` (
						  `id_campaign` int(5) NOT NULL PRIMARY KEY,
						  `subject` varchar(255) NOT NULL default '',
						  `date` varchar(10) NOT NULL ,
						  `time` varchar(8) NOT NULL,
						  `num_sent` int(8) NOT NULL
						) ENGINE="._MYSQL_ENGINE_." DEFAULT CHARSET=utf8";

	$sql[] = "CREATE TABLE IF NOT EXISTS `"._DB_PREFIX_."mailing_sent` (
						  `id_campaign` varchar(5) NOT NULL default '',
						  `email` varchar(128) NOT NULL default '',
						  `date` varchar(20) NOT NULL,
						  `dateReceived` varchar(20) NOT NULL,
						  INDEX (`email`)
						) ENGINE="._MYSQL_ENGINE_." DEFAULT CHARSET=utf8";

	$sql[] = "CREATE TABLE IF NOT EXISTS `"._DB_PREFIX_."mailing_import` (
						`ID` int(5) NOT NULL PRIMARY KEY auto_increment,
						`email` varchar(128) NOT NULL default '',
						`lastname` varchar(32)  default '',
						`firstname` varchar(32)  default ''
						) ENGINE="._MYSQL_ENGINE_." DEFAULT CHARSET=utf8";