<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'description' => 'Administrator with full access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'teachers',
                'description' => 'Regular teachers with limited access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'students',
                'description' => 'Regular student with limited access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
