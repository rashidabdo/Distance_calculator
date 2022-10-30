<?php

namespace App\Http\Services;

class DistanceCalculatorService
{
    protected $calculator;

    public function __construct()
    {
        $this->calculator = new CalculatorFactory();
    }

    public function calculate($unit, $data)
    {
        $model = $this->calculator->handle($unit);
        $updatedData = $model->converter($data);
        $distances = array_column($updatedData,'value');

        return $this->sumDistances($distances);
    }

    private function sumDistances(array $distances)
    {
        return array_sum($distances);
    }
}
