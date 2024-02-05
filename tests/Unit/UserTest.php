<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function it_can_display_card_payment_page()
    {
        $totalprice = 100;
        $response = $this->get("/card_payment/{$totalprice}");
        $response->assertStatus(200);
        $response->assertViewIs('home.card_payment');
        $response->assertSee('Payment Details');
        $response->assertSee('Payment Amount: $100');
        $response->assertSee('Card Number');
    }
    
    public function it_displays_error_message_for_invalid_card_details()
    {
        $response = $this->post("/card_payment/validate", [
            'card-number' => 'invalid_card_number',
        ]);

        $response->assertStatus(422); // Assuming you return 422 for validation errors
        $response->assertJsonValidationErrors([
            'card-number',
        ]);
    }
}