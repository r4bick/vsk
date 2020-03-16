<?php

include_once '../vendor/autoload.php';
include_once '../core/env.php';
include_once '../core/bootstrap.php';

use app\DateFormatter;
use app\Downloader;
use app\ExcelBuilder;
use app\Report;


if(isset($_POST['start']) && isset($_POST['end'])):

    $start = DateFormatter::convert($_POST['start']);
    $end = DateFormatter::convert($_POST['end']);

    if($start > $end && !empty($start) && !empty($end))
        header('Location: /');

    $report = Report::getReport($start, $end);
    $excel_builder = new ExcelBuilder($report);

    $file = $excel_builder->createXlsFile();

    Downloader::downloadXls($file);

endif;


