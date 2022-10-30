<?php

namespace App\Http\Services;

class DistanceCalculatorService
{
    protected $calculator;
    protected $model;
    protected $data;

    public function __construct()
    {
        $this->calculator = new CalculatorFactory();
    }

    public function calculate($unit, $data)
    {
        $model = $this->calculator->handle($unit);
        $updatedData = $model->converter($data);
       // print_r($updatedData);die();
        $distances = array_column($updatedData,'value');
       return $this->sumDistances($distances);


//        return $model->sum($updatedData['distance1']['value'], $updatedData['distance2']['value']);
    }

    private function sumDistances(array $distances)
    {
        return array_sum($distances);
    }
}
