<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ketua = factory(User::class)->create([
            'name'     => 'sri',
            'email'    => 'sri@persediaan.com',
            'email_verified_at' => now(),
            'password' => bcrypt('persediaan'),
        ]);

        $ketua->assignRole('ketua');

        $this->command->info('>_ Here is your ketua details to login:');
        $this->command->warn($ketua->email);
        $this->command->warn('Password is "persediaan"');

        $customer = factory(User::class)->create([
            'name'     => 'nanda',
            'email'    => 'nanda@persediaan.com',
            'email_verified_at' => now(),
            'password' => bcrypt('persediaan'),
        ]);

        $customer->assignRole('customer');

        $this->command->info('>_ Here is your customer details to login:');
        $this->command->warn($customer->email);
        $this->command->warn('Password is "persediaan"');

        // bersihkan cache
        $this->command->call('cache:clear');
    }
}
