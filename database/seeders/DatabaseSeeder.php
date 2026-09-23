<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\Transfer;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Plan::updateOrCreate(['slug' => 'starter'], [
            'name' => 'Starter',
            'description' => 'Entry-level access for individual users.',
            'price' => null,
            'billing_type' => 'monthly',
            'active' => true,
        ]);

        Plan::updateOrCreate(['slug' => 'basic'], [
            'name' => 'Basic',
            'description' => 'Regular use with additional transfer capability.',
            'price' => null,
            'billing_type' => 'monthly',
            'active' => true,
        ]);

        Plan::updateOrCreate(['slug' => 'premium'], [
            'name' => 'Premium',
            'description' => 'Advanced features and higher-volume use.',
            'price' => null,
            'billing_type' => 'monthly',
            'active' => true,
        ]);

        Plan::updateOrCreate(['slug' => 'top-up'], [
            'name' => 'Top-up',
            'description' => 'One-off additional transfer allowance.',
            'price' => null,
            'billing_type' => 'one_off',
            'active' => true,
        ]);

        $admin = User::updateOrCreate(
            ['email' => 'admin@ezepost.local'],
            [
                'name' => 'EZE POST Admin',
                'password' => 'Admin123!',
                'account_type' => 'individual',
                'role' => 'admin',
            ]
        );

        $customer = User::updateOrCreate(
            ['email' => 'customer@example.com'],
            [
                'name' => 'Demo Customer',
                'password' => 'Password123!',
                'account_type' => 'individual',
                'role' => 'customer',
            ]
        );

        if (! $customer->transfers()->exists()) {
            Transfer::create([
                'user_id' => $customer->id,
                'file_name' => 'example-document.pdf',
                'file_size' => 245760,
                'recipient' => 'recipient@example.com',
                'status' => 'sent',
                'sent_at' => now(),
            ]);
        }
    }
}
