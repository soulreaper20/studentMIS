<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'admin@admin.com')->first();

        if(!$user) {
        	User::create([
        		'name' => 'Admin',
        		'email' => 'admin@admin.com',
        		'role' => 'superAdmin',
        		'password' => Hash::make('Admin123'),
            'faculty' => 'Science']);

        }
    }
}
