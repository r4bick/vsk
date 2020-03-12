<?php

use core\web\Config;

$config = include '../config/config.php';
include_once 'functions.php';

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

Config::config($config);
