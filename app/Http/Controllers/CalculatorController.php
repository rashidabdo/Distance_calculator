<?php

namespace App\Http\Controllers;

use App\Http\Requests\DistanceRequest;
use App\Http\Services\DistanceCalculatorService;

class CalculatorController extends Controller
{
    protected $distanceCalculatorService;

    public function __construct(DistanceCalculatorService $distanceCalculatorService)
    {
        $this->distanceCalculatorService = $distanceCalculatorService;
    }

    public function getSum(DistanceRequest $request)
    {
        if ($request->validated()) {
            $unit = $request->get('return_unit');
            $data = $request->only(['distance1', 'distance2']);
            $sum = $this->distanceCalculatorService->calculate($unit, $data);

            return ['Sum' => $sum];
        }
    }
}
