<?php

namespace Database\Seeders;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
      for($i=0; $i<10 ; $i++) {
          $newProjgect = new Project();
          $newProjgect->title = $faker->sentence(3);
          $newProjgect->content = $faker->text(500);
          $newProjgect->slug = Str::slug($newProjgect->title);
          $newProjgect->save();
      }  

    }
}
