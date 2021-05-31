<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_branches', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250)->nullable();
            $table->string('name_ar', 250)->nullable();
            $table->integer('organization_id')->nullable();
            $table->integer('organization_type_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->text('address')->nullable();
            $table->string('phone',30)->nullable();
            $table->string('mobile',30)->nullable();
            $table->string('email', 250)->nullable();
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
        Schema::dropIfExists('organization_branches');
    }
}
