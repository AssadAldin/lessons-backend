<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LessonClass;

class LessonClassSeeder extends Seeder
{
    public function run()
    {
        LessonClass::factory(100)->create();
    }
}
