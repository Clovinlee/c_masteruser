<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            "name" => "Andy",
            "email" => "a@gmail.com",
            // "description"=>"",
            "password" => "a",
        ]);

        User::create([
            "name" => "Benyamin Limanto",
            "email" => "b@gmail.com",
            "description" => "Koding adalah makanan ku sehari hari",
            "password" => "b",
        ]);

        User::create([
            "name" => "Chrisanto Sinatra",
            "email" => "c@gmail.com",
            "description" => "Aku adalah orang malas yang ingin kaya dengan cepat tanpa usaha",
            "password" => "c",
        ]);
    }
}
