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
        $user = User::where('email', 'ankit_subedi@hotmail.com')->first();

        if(!$user) {
        	User::create([
        		'name' => 'Ankit Subedi',
        		'email' => 'ankit_subedi@hotmail.com',
        		'role' => 'superAdmin',
        		'password' => Hash::make('Rubious12'),
            'faculty' => 'Science']);

        }
    }
}
