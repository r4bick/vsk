<?php


namespace app;


use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ExcelBuilder
{
    const XLS_PATH = '/files/xls/';

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getColumnNames()
    {
        return [
            'name' => 'Наименование точки продаж',
            'terminal_name' => 'Имя терминала',
            'terminal_number' => 'Номер терминала',
            'bank_name' => 'Наименование банка',
            'total_sum' => 'Объем транзакций через терминал за период',
            'total_commission' => 'Объем уплаченной комиссии терминала за период',
            'count' => 'Количество транзакций за период'
        ];
    }

    public function getArrayData()
    {
        $arrayData[] = array_values($this->getColumnNames());

        foreach ($this->data as $key => $values):
            foreach ($values as $value):
                $row = [];
                $row[] = $key;
                $row = array_merge($row, array_values($value));
                $arrayData[] = $row;
            endforeach;
        endforeach;

        return count($arrayData) == 1 ? [] : $arrayData;
    }

    /**
     * @return Spreadsheet
     * @throws Exception
     */
    public function createXlsFile()
    {
        $data = $this->getArrayData();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->fromArray($data, null, 'A1');

        return $spreadsheet;
    }

}