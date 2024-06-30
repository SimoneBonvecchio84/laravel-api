<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tecnologies = ['PHP', 'JavaScript', 'Java', 'C++', 'Python'];
        foreach ($tecnologies as $technology) {
            $newtechnology = new Technology();
            $newtechnology->name = $technology;
            $newtechnology->author = $technology;
            $newtechnology->types = $technology;
            $newtechnology->save();
        }
    }
}
