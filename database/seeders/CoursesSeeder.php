<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;
use App\Models\Courses;


class CoursesSeeder extends Seeder
{
    use HasFactory;

    /**
     * Run the database seeds.
     *s
     * @return void
     */
    public function run()
    {
        Courses::factory()->count(10)->create();
    }
}
