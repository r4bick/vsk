<?php

session_start();

include_once '../vendor/autoload.php';
include_once '../core/bootstrap.php';
include_once '../core/env.php';

__dd(getenv('DB_HOST'));
