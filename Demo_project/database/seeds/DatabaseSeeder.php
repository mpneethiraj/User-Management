<?php

use Illuminate\Database\Seeder;
use App\Model\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('admin_users')->insert([
            'name' => "Admin",
            'email' => "admin@gmail.com",
            'password' =>Hash::make('Admin@123'),
            'username' =>"Admin",
        ]);
    }
}
