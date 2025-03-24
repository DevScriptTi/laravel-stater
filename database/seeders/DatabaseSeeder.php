<?php

namespace Database\Seeders;

use App\Models\Api\User\Admin;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin =Admin::create(['username'=>'Developer-1234']);
        $key = $admin->key()->create();
        $key->user()->create(['email'=>'admin@gmail.com','password'=>'password']);

    }
}
