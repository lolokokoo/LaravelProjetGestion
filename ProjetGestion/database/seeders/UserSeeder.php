<?php

namespace Database\Seeders;

use App\Models\Role;
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
        User::factory(50)->create();
        $roles = Role::all()->pluck('id');
        $users = User::all();
        foreach ($users as $user){
            $user->roles()->attach(rand(1,count($roles)));
        }
    }
}
