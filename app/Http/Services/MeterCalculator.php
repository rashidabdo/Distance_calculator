<?php

namespace App\Http\Services;

use App\Http\Interfaces\Calculator;

class MeterCalculator implements Calculator
{
    const TO_METER_MULTIPLY = 0.9144;
    
    public function converter($data): array
    {
        if ($data['distance1']['unit'] != 'Meter') {
            $data['distance1']['value'] = $data['distance1']['value'] * self::TO_METER_MULTIPLY;
        } elseif ($data['distance2']['unit'] != 'Meter') {
            $data['distance2']['value'] = $data['distance2']['value'] * self::TO_METER_MULTIPLY;
        }
        return $data;
    }
}
