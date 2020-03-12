<?php

session_start();

include_once '../vendor/autoload.php';
include_once '../core/env.php';
include_once '../core/bootstrap.php';

__dd(\core\web\Config::db());
