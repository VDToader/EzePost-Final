<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransferTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_add_transfer_record(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->post('/transfers', [
            'file_name' => 'report.pdf',
            'file_size' => 12345,
            'recipient' => 'recipient@example.com',
            'status' => 'sent',
        ])->assertRedirect();

        $this->assertDatabaseHas('transfers', [
            'user_id' => $user->id,
            'file_name' => 'report.pdf',
            'status' => 'sent',
        ]);
    }
}
