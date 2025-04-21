<?php

namespace Tests\Unit;

use App\Models\Good;
use App\Services\GoodService;
use Mockery;
use PHPUnit\Framework\TestCase;

class GoodServiceTest extends TestCase
{
    public function it_can_create_a_good()
    {
        $data = [
            'name' => 'Test Good',
            'price' => 100,
            'description' => 'This is a test good',
        ];

        $goodMock = Mockery::mock(Good::class);
        $goodMock->shouldReceive('create')->once()->with($data)->andReturnSelf();

        $service = new GoodService();
        $result = $service->create($data);
        $this->assertInstanceOf(Good::class, $result);
    }

    public function it_can_update_a_good()
    {
        $existingData = [
            'name' => 'Old Good',
            'price' => 50,
            'description' => 'This is an old good',
        ];

        $updatedData = [
            'name' => 'Updated Good',
            'price' => 200,
            'description' => 'This is an updated good',
        ];

        $goodMock = Mockery::mock(Good::class);
        $goodMock->shouldReceive('update')->once()->with($updatedData)->andReturnTrue();

        $service = new GoodService();
        $result = $service->update($goodMock, $updatedData);
        $this->assertTrue($result);
    }
    
}
