<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $types = Type::all();
        $ids = $types->pluck('id');


        for ($i = 0; $i < 20; $i++) {

            
            $new_project = new Project();

            $new_project->title = $faker->sentence(3);
            $new_project->thumb = $faker->imageUrl();
            $new_project->description = $faker->text();
            $new_project->slug = Str::slug($new_project->title, '-');
            $new_project->type_id = $faker->optional()->randomElement($ids);

            $new_project->save();
        }
    }
}
