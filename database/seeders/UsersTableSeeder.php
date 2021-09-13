<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'rankcode' => 'Cpl',
            'unitcode' => 'NETB',
            'pamu' => 'ASR',
            'firstname' => 'Ryan',
            'middlename' => 'Labarda',
            'lastname' => 'Malatbalat',
            'appendage' => '',
            'email' => 'ryanqtebonay914881@army.mil.ph',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
