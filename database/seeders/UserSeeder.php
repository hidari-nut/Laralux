<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create(
        //     ["name"=>"Aston Inn Staff", "email"=>"astoninn@staff.com", "email_verified_at"=>now(), "password" => bcrypt("astoninn"), "img"=>"1719407741_fotoku.jpg", "created_at"=>now(), "updated_at"=>now(), "roles_id"=>2]
        // );
        User::create(
            ["name"=>"Aston Inn Owner", "email"=>"astoninn@owner.com", "email_verified_at"=>now(), "password" => bcrypt("astoninnowner"), "img"=>"noimage.jpeg", "created_at"=>now(), "updated_at"=>now(), "roles_id"=>1]
        );
    }
}
