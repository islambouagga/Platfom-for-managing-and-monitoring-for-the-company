<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Core\Number;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        DB::table('admins')->insert(     ['id' => 1,]);
        DB::table('users')->insert([
            'nomUtilis' => 'Admin',
            'prenomUtilis' => 'Admin',
            'adressUtilis' => 'ADMIN Adderess',
            'tel' => 123456789,
            'usertable_id' => 1,
            'usertable_type' => 'Admin',
            'dateNUtilis' => Carbon::now(),
            'email' => 'Admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('directeurs')->insert(['id' => 1,]);
        DB::table('users')->insert([
            'nomUtilis' => 'Directeur',
            'prenomUtilis' => 'Directeur',
            'adressUtilis' => 'Directeur Adderess',
            'tel' => 123456789,
            'usertable_id' => 1,
            'usertable_type' => 'Directeur',
            'dateNUtilis' => Carbon::now(),
            'email' => 'Directeur@gmail.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('agent_t_c_s')->insert(['id' => 1,]);
        DB::table('users')->insert([
            'nomUtilis' => 'AgentTC',
            'prenomUtilis' => 'AgentTC',
            'adressUtilis' => 'AgentTC Adderess',
            'tel' => 123456789,
            'usertable_id' => 1,
            'usertable_type' => 'AgentTC',
            'dateNUtilis' => Carbon::now(),
            'email' => 'AgentTC@gmail.com',
            'password' => Hash::make('password'),
        ]);

    }
}
