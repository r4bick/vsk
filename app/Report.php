<?php


namespace app;


use core\web\db\DB;

class Report
{
    public static function getQuery($start = null, $end = null)
    {
        $where = !empty($start) && !empty($end) ? "where tr.date >= '{$start}' and tr.date <= '{$end}'" : " ";

        return "select br.name, t.name as terminal_name, t.number as terminal_number, 
            bank.name as bank_name, sum(tr.value) as total_sum, 
            sum(tr.commission) as total_commission, count(tr.id_terminal) as count
            from branch br 
            left join branch_terminal brt on br.id = brt.id_branch 
            left join terminal t on brt.id_terminal = t.id
            left join bank_terminal bt on brt.id_terminal = bt.id_terminal
            left join bank on bt.id_bank = bank.id
            left join transaction tr on tr.id_terminal = t.id 
            {$where}
            group by br.name, t.name, t.number, bank.name;";
    }

    public static function getReport($start = null, $end = null)
    {
        return DB::db()->command(self::getQuery($start, $end))->getAll();
    }

}