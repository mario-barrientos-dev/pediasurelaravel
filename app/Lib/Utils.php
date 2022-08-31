<?php

namespace App\Lib;

use Carbon\Carbon;

class Utils
{
    public static function spanishDate($date) {
        $months = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $month = $months[($date->format('n')) - 1];
        return $date->format('d') . ' de ' . $month . ' del ' . $date->format('Y');
    }
}
