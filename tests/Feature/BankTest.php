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
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_bank()
    {
        // Arrange
        $data = [
            'name' => 'Example Bank',
            'swift' => 'EXAMPLESWFT',
            // Add other required fields
        ];

        // Act
        $response = $this->post(route('banks.store'), $data);

        // Assert
        $response->assertStatus(201);
        $this->assertDatabaseHas('banks', $data);
    }

    /** @test */
    // public function it_can_show_a_bank()
    // {
    //     // Arrange
    //     $bank = factory(Bank::class)->create();

    //     // Act
    //     $response = $this->get(route('banks.show', ['bank' => $bank->id]));

    //     // Assert
    //     $response->assertStatus(200);
    //     $response->assertJsonFragment(['id' => $bank->id]);
    // }

    /** @test */
    // public function it_can_update_a_bank()
    // {
    //     // Arrange
    //     $bank = factory(Bank::class)->create();
    //     $updatedData = [
    //         'name' => 'Updated Bank Name',
    //         // Update other fields as needed
    //     ];

    //     // Act
    //     $response = $this->put(route('banks.update', ['bank' => $bank->id]), $updatedData);

    //     // Assert
    //     $response->assertStatus(200);
    //     $this->assertDatabaseHas('banks', $updatedData);
    // }

    /** @test */
    // public function it_can_delete_a_bank()
    // {
    //     // Arrange
    //     $bank = factory(Bank::class)->create();

    //     // Act
    //     $response = $this->delete(route('banks.destroy', ['bank' => $bank->id]));

    //     // Assert
    //     $response->assertStatus(204);
    //     $this->assertDatabaseMissing('banks', ['id' => $bank->id]);
    // }
}
