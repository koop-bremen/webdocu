<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PlacesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(PersonTableSeeder::class);
        $this->call(AuthorsTableSeeder::class);
    }
}
