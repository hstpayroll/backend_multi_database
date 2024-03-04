<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;

// test('login screen can be rendered', function () {
//     $response = $this->get('/login');

//     $response->assertStatus(200);
// });


// test('users can not authenticate with invalid password', function () {
//     $user = User::factory()->create();

//     $this->post('/login', [
//         'email' => $user->email,
//         'password' => 'wrong-password',
//     ]);

//     $this->assertGuest();
// });

// test('users can logout', function () {
//     $user = User::factory()->create();

//     $response = $this->actingAs($user)->post('/logout');

//     $this->assertGuest();
//     $response->assertRedirect('/');
// });




// test('authenticates a user with valid credentials and returns a token', function () {
//     // Create a user
//     $user = User::factory()->create();
//     // Send a POST request with valid credentials
//     $response = $this->postJson('/api/v1/login', [
//         'email' => $user->email,
//         'password' => 'password', // Assuming 'password' is the user's password
//     ]);
//     // dd($response);
//     // Assert successful response and data
//     $user = [
//         'email' => $user->email,
//         'password' => 'password'
//     ];

//     $response->assertStatus(200);
//     $response->assertJsonStructure([
//         'user' => ['email', 'password'],
//         'token'
//     ]);

//     // Ensure a token is present in the response
//     $response->assertJson(['token' => expect($response->json('token'))->toBeString()]);
// });

// it('returns an error response for invalid credentials', function () {
//     // Send a POST request with invalid credentials
//     $response = $this->postJson('/login', [
//         'email' => 'invalid@email.com',
//         'password' => 'wrongpassword'
//     ]);

//     // Assert error response
//     $response->assertStatus(422)
//         ->assertJson([
//             'error' => 'The Provided credentials are not correct'
//         ]);
// });
