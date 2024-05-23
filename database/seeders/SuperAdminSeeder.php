<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin = new User;
        $superadmin->name = "Owner";
        $superadmin->email = "njimateaicha@gmail.com";
        $superadmin->password = Hash::make("owner1230");
        $superadmin->image ="public\assets\img\photos\s0ZHBS9WAktWToC4eaYZCa5gZuF1Ii7s1Vt9KhLP.jpg";
        $superadmin->user_type = "owner";
        $superadmin->is_validated = true;
        $superadmin->save();
    }
}
