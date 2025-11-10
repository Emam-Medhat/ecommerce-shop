<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
 ]);
 User::create([
            'name' => 'Admin',
            'email' => 'am7834213@gmail.com',
            'password' => Hash::make('01033643475'), // تشفير الباسورد
            'profile_picture' => 'default.png',      // ضع صورة افتراضية
            'phone' => '01033643475',
            'address' => 'مصر',
            'role' => 'admin',
        ]);     
        
    }
}
