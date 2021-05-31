<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250)->nullable();
            $table->string('mobile',30)->nullable();
            $table->string('name_ar', 250)->nullable();
            $table->string('designation', 250)->nullable();
            $table->string('degree', 250)->nullable();
            $table->integer('specialty_id')->nullable();
            $table->string('capital_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('licence')->nullable();
            $table->integer('passing_year')->nullable();
            $table->text('certificate')->nullable();
            $table->text('photo')->nullable();
            $table->text('address')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_verified')->default(1);
            $table->integer('created_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('doctors');
    }
}
