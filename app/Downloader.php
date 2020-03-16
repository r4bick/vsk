<?php

namespace app;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Exception;

class Downloader
{
    /**
     * @param $spreadsheet
     * @throws Exception
     */
    public static function downloadXls($spreadsheet)
    {

        $writer = IOFactory::createWriter($spreadsheet, "Xls");

        $file_name = 'report_' . time() . '.xls';
        header("Content-Disposition: attachment; filename=$file_name");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        $writer->save("php://output");
    }

}