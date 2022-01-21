<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where('id', 1)->exists()) {
            User::create([
                'id' => 1,
                'name' => 'Developer',
                'username' => 'developer',
                'email' => 'developer@task.loc',
                'password' => Hash::make('12345678'),
            ]);
        }
    }
}
