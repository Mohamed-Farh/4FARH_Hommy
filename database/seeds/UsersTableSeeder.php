<?php

use Illuminate\Database\Seeder;

class UsersTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = \App\User::create([
            'name' => 'Super Admin',
            'name_ar' => 'سـوبـر أدمـن',
            'email' => 'superAdmin@superAdmin.com',
            'admin' => '1',
            'password' => bcrypt('password'),
        ]);
        $superAdmin->attachRole('super_admin');

        $admin = \App\User::create([
            'name' => 'Admin Admin',
            'name_ar' => ' أدمـن',
            'email' => 'admin@admin.com',
            'admin' => '1',
            'password' => bcrypt('password'),
        ]);
        $admin->attachRole('admin');

        $user = \App\User::create([
            'name' => 'User User',
            'name_ar' => 'مـسـتـخـدم',
            'email' => 'user@user.com',
            'admin' => '0',
            'password' => bcrypt('password'),
        ]);
        $user->attachRole('user');
    }
}
