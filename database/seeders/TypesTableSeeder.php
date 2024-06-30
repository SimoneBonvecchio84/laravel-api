<?php

namespace Database\Seeders;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['red', 'yellow', 'orange', 'pink', 'green', 'blue', 'brown', 'black' ];
        foreach($types as $curType) {
            $newType = new Type();
            $newType->name = $curType;
            $newType->color =$curType;
            $newType->icons = $curType;
            $newType->save();

        }
    }
}
