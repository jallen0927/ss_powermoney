<?php

global $project;
$project = 'powermoney';

global $database;
$database = 'powermoney';

// Use _ss_environment.php file for configuration
require_once("conf/ConfigureFromEnv.php");

// Set the site locale
i18n::set_locale('en_US');

define('CSS_DIR', THEMES_DIR. "/" . SSViewer::current_custom_theme() . '/css');
define('JS_DIR', THEMES_DIR. "/" . SSViewer::current_custom_theme() . '/javascript');
define('BOWER_PATH', 'bower_components');