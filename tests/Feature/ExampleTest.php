<?php

namespace Tests\Feature;

use App\Http\Services\CalculatorFactory;
use App\Http\Services\MeterCalculator;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_example()
    {
        $response = $this->post('/api/calculate');
        $response->assertStatus(200);
    }

    public function test_not_validation_request()
    {
        $response = $this->postJson('/api/calculate', [
            'distance1' => [
                'value' => 4,
                'unit' => 'Yards',
            ],
            'distance2' => [
                'value' => 3,
                'unit' => 'Meaters',
            ],
            'return_unit' => 'Meters',
        ]);

        $this->assertFalse($response->original['success']);
    }

    public function test_valid_request()
    {
        $response = $this->postJson('/api/calculate', [
            'distance1' => [
                'value' => 4,
                'unit' => 'Yards',
            ],
            'distance2' => [
                'value' => 4,
                'unit' => 'Meters',
            ],
            'return_unit' => 'Meters',
        ]);

        $this->assertEquals($response->original, ["Sum" => 7.6576, "unit" => "Meters"]);
    }

    public function test_calculation_factory_with_meter()
    {
        $calcFactory = new CalculatorFactory();
        $meterModel = $calcFactory->handle('meters');
        $this->assertInstanceOf(MeterCalculator::class,$meterModel);
    }
}
