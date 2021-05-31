<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmaciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_ar');
            $table->string('owner');
            $table->string('mobile');
            $table->string('phone');
            $table->string('email');
            $table->string('capital_id');
            $table->string('city_id');
            $table->string('licence');
            $table->string('address');
            $table->string('user_name');
            $table->integer('status')->default(1);
            $table->Integer('is_active')->default(1);
            $table->Integer('is_verified')->default(1);
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
        Schema::dropIfExists('pharmacies');
    }
}
