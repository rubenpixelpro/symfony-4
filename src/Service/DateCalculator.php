<?php


namespace App\Service;


class DateCalculator
{
    public function yearDiff($year){
        $curYear = date('Y');
        $diff = $curYear - $year;
        return $diff;
    }
}