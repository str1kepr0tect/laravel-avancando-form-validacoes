<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('document_number');
            $table->string('email');
            $table->string('phone');
            $table->boolean('defaulter'); //inadimplente
            $table->date('date_birth')->nullable();
            $table->char('sex', 10)->nullable();
            $table->enum('marital_status', array_keys(\App\Models\Client::MARITAL_STATUS))->nullable();
            $table->string('physical_disability')->nullable();
            $table->string('company_name')->nullable();
            $table->string('client_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
