<?php

namespace Database\Factories;

use App\Http\Controllers\Admin\ClientsController;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;

require_once __DIR__ . '/../faker_data/document_number.php';



class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Client::class;


    public function definition()
    {
        $cpfs = cpfs();
        $cnpjs = cnpjs();
        return [

            'email' => $this->faker->freeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'defaulter' => rand(0, 1),

        ];
    }

    public function individualMale()
    {

        return $this->state( function() {
            $cpfs = cpfs();
            return [
                'name' => $this->faker->name('male'),
            'client_type' => Client::TYPE_INDIVIDUAL,
            'document_number' => $this->faker->cpf(),
           // 'document_number' => $cpfs[array_rand($cpfs, 1)],
            'date_birth' => $this->faker->date(),
            'sex' => 'm',
            'marital_status' => rand(1, 3),
            'physical_disability' => rand(1, 10) % 2 == 0 ? $this->faker->word : null,
        ];
        });
    }
    public function individualFemale()
    {

        return $this->state( function() {
            $cpfs = cpfs();
            return [
                'name' => $this->faker->name('female'),
            'client_type' => Client::TYPE_INDIVIDUAL,
            'document_number' => $this->faker->cpf(),
           // 'document_number' => $cpfs[array_rand($cpfs, 1)],
            'date_birth' => $this->faker->date(),
            'sex' => 'f',
            'marital_status' => rand(1, 3),
            'physical_disability' => rand(1, 10) % 2 == 0 ? $this->faker->word : null,
        ];
        });
    }
    public function legal()
    {

        return $this->state(function() {
            $cnpjs = cnpjs();
            return [
                'name' => $this->faker->company(),
            'client_type' => Client::TYPE_LEGAL,
            'document_number' => $this->faker->cnpj(),
            //'document_number' => $cnpjs[array_rand($cnpjs, 1)],
            'company_name' => $this->faker->company(),
        ];
        });
    }

}
/*

            $table->string('name');
            $table->string('document_number');
            $table->string('email');
            $table->string('phone');
            $table->boolean('defaulter'); //inadimplente
            $table->date('date_birth');
            $table->char('sex', 10);
            $table->enum('marital_status', array_keys(\App\Models\Client::MARITAL_STATUS));
            $table->string('physical_disability')->nullable();


            php artisan tinker
            $client = Client::factory()->count(10)->make()

*/
