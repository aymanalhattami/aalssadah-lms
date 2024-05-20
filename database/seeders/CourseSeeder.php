<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use BezhanSalleh\FilamentShield\Support\Utils;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Spatie\Permission\Models\Role::create([
            'name' => Utils::getFilamentUserRoleName(),
            'guard_name' => config('auth.defaults.guard')
        ]);

        DB::table('courses')->insert([
            'name' => Str::random(10),

        ])->has(
            \App\Models\Lesson::factory()
                ->for(\App\Models\name::factory())
                ->for(\App\Models\content::factory())
                ->count(8)
        );
    }
}
