<?php

global $project;
$project = 'powermoney';

global $databaseConfig;
$databaseConfig = array(
	"type" => 'MySQLDatabase',
	"server" => 'localhost',
	"username" => '3adb',
	"password" => 'Feb232015',
	"database" => 'ss_powermoney',
	"path" => '',
);

// Set the site locale
i18n::set_locale('en_US');