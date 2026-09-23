<?php

namespace Tests\Feature;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class BackendSecurityTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_dashboard(): void
    {
        $this->get('/dashboard')
            ->assertRedirect('/login');
    }

    public function test_guest_cannot_create_transfer_record(): void
    {
        $this->post('/transfers', [
            'file_name' => 'secret.pdf',
            'file_size' => 1000,
            'recipient' => 'recipient@example.com',
            'status' => 'sent',
        ])->assertRedirect('/login');

        $this->assertDatabaseCount('transfers', 0);
    }

    public function test_guest_cannot_download_account_pdf(): void
    {
        $this->get('/account/summary.pdf')
            ->assertRedirect('/login');
    }

    public function test_organisation_registration_requires_organisation_name(): void
    {
        $response = $this->post('/register', [
            'account_type' => 'organisation',
            'name' => 'Organisation User',
            'email' => 'organisation@example.com',
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
            'terms' => '1',
        ]);

        $response->assertSessionHasErrors('organisation_name');

        $this->assertDatabaseMissing('users', [
            'email' => 'organisation@example.com',
        ]);
    }

    public function test_duplicate_email_registration_is_rejected(): void
    {
        User::factory()->create([
            'email' => 'duplicate@example.com',
        ]);

        $response = $this->post('/register', [
            'account_type' => 'individual',
            'name' => 'Second User',
            'email' => 'duplicate@example.com',
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
            'terms' => '1',
        ]);

        $response->assertSessionHasErrors('email');

        $this->assertDatabaseCount('users', 1);
    }

    public function test_registered_password_is_hashed(): void
    {
        $this->post('/register', [
            'account_type' => 'individual',
            'name' => 'Hash Test',
            'email' => 'hash@example.com',
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
            'terms' => '1',
        ]);

        $user = User::where('email', 'hash@example.com')->firstOrFail();

        $this->assertNotSame('Password123!', $user->password);
        $this->assertTrue(
            Hash::check('Password123!', $user->password)
        );
    }

    public function test_disabled_plan_cannot_start_checkout(): void
    {
        $user = User::factory()->create();

        $plan = Plan::create([
            'name' => 'Disabled Plan',
            'slug' => 'disabled-plan',
            'description' => 'Test plan',
            'price' => 10.00,
            'billing_type' => 'monthly',
            'stripe_price_id' => 'price_test',
            'active' => false,
        ]);

        $this->actingAs($user)
            ->post('/checkout/'.$plan->id)
            ->assertSessionHasErrors('payment');
    }

    public function test_plan_without_stripe_price_cannot_start_checkout(): void
    {
        $user = User::factory()->create();

        $plan = Plan::create([
            'name' => 'Unconfigured Plan',
            'slug' => 'unconfigured-plan',
            'description' => 'Test plan',
            'price' => 10.00,
            'billing_type' => 'monthly',
            'stripe_price_id' => null,
            'active' => true,
        ]);

        $this->actingAs($user)
            ->post('/checkout/'.$plan->id)
            ->assertSessionHasErrors('payment');
    }

    public function test_invalid_stripe_webhook_signature_is_rejected(): void
    {
        config([
            'services.stripe.webhook_secret' => 'whsec_test_secret',
        ]);

        $this->call(
            'POST',
            '/stripe/webhook',
            [],
            [],
            [],
            [
                'HTTP_STRIPE_SIGNATURE' => 'invalid-signature',
                'CONTENT_TYPE' => 'application/json',
            ],
            '{}'
        )->assertStatus(400);
    }
}