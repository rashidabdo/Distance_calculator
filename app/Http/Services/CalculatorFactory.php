<?php

namespace App\Http\Services;

class CalculatorFactory
{
    protected $model;

    public function handle($returnUnit)
    {
        if (strtolower($returnUnit) == 'meters')
            return $this->model = new MeterCalculator();
        else
            return $this->model = new yardCalculator();
    }
}
