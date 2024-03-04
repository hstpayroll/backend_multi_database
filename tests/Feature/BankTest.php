<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Tenant\Bank;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BankTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase, WithFaker;

    /** @test */
    public function testIndexReturnsPaginatedBanksWithCorrectAttributes()
    {
        // Create a factory for Bank model if not already defined:
        Bank::factory()->count(15)->create();

        $response = $this->getJson('/api/v1/banks'); // Adjust route based on actual API path

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'swift',
                    ],
                ],
                'links' => [
                    'first',
                    'last',
                    'prev',
                    'next',
                ],
                'meta' => [
                    'current_page',
                    'from',
                    'last_page',
                    'path',
                    'per_page',
                    'to',
                    'total',
                ],
            ]);

        $data = $response->json('data');

        // Assert that each bank resource in the response has the expected attributes:
        // $data->each(function ($bank) use ($response) {
        //     $this->assertInstanceOf(BankResource::class, $bank);
        //     $this->assertArrayHasKey('id', $bank);
        //     $this->assertArrayHasKey('name', $bank);
        //     $this->assertArrayHasKey('swift', $bank);
        // });

        // Additional assertions based on specific conditions can be added here:
        // - Verify pagination meta information
        // - Check for specific data based on factory or test setup

        // Example: Assert that only the first 10 banks are returned,
        // considering the page size is 10 in the `paginate` call:
        $this->assertCount(10, $data);
    }
}
