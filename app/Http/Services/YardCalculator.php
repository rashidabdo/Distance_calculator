<?php

namespace App\Http\Services;

use App\Http\Interfaces\Calculator;

class YardCalculator implements Calculator
{
    const TO_YARD_MULTIPLY = 1.0936;

    public function converter($data): array
    {
        if ($data['distance1']['unit'] != 'Yards') {
            $obj['distance1']['value'] = $data['distance1']['value'] * self::TO_YARD_MULTIPLY;
        } elseif ($data['distance2']['unit'] != 'Yards') {
            $data['distance2']['value'] = $data['distance2']['value'] * self::TO_YARD_MULTIPLY;
        }
        return $data;
    }
}
