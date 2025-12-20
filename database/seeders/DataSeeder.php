<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;
use App\Models\News;

class DataSeeder extends Seeder
{
    public function run()
    {
        Program::factory(7)->withMedia()->create();
        News::factory(7)->withMedia()->create();
    }
}