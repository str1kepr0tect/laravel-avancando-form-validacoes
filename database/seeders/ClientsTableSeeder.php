<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Client::factory(10)->individualMale()->create();
        \App\Models\Client::factory(10)->individualFemale()->create();
        \App\Models\Client::factory(10)->legal()->create();
        \App\Models\Client::factory(10)->individualMale()->create();
        \App\Models\Client::factory(10)->individualFemale()->create();
        \App\Models\Client::factory(10)->legal()->create();
        \App\Models\Client::factory(10)->individualMale()->create();
        \App\Models\Client::factory(10)->individualFemale()->create();
        \App\Models\Client::factory(10)->legal()->create();
        \App\Models\Client::factory(10)->individualMale()->create();
        \App\Models\Client::factory(10)->individualFemale()->create();
        \App\Models\Client::factory(10)->legal()->create();
        \App\Models\Client::factory(10)->individualMale()->create();
        \App\Models\Client::factory(10)->individualFemale()->create();
        \App\Models\Client::factory(10)->legal()->create();
    }
}
