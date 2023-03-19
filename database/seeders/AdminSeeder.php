<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Admin::where('email', 'info@aera-capital.com')->doesntExist()) {
            $admin = new Admin;
            $admin->name = 'Aera Capital';
            $admin->email = 'info@aera-capital.com';
            $admin->username = 'admin';
            $admin->password = Hash::make('admin@12345');
            $admin->user_type = 'S';
            $admin->save();
        }
    }
}
