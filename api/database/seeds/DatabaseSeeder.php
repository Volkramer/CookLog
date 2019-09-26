<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role' => 'basic'
        ]);
        DB::table('roles')->insert([
            'role' => 'moderator'
        ]);
        DB::table('roles')->insert([
            'role' => 'administrator'
        ]);
        DB::table('skill_levels')->insert([
            'level' => 'beginner'
        ]);
        DB::table('skill_levels')->insert([
            'level' => 'intermediate'
        ]);
        DB::table('skill_levels')->insert([
            'level' => 'advanced'
        ]);
        DB::table('skill_levels')->insert([
            'level' => 'pro'
        ]);
    }
}
