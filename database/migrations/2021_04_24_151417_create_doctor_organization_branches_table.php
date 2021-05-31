<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorOrganizationBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_organization_branches', function (Blueprint $table) {
            $table->id();
            $table->integer('doctor_id')->nullable();
            $table->integer('specialty_id')->nullable();
            $table->integer('organization_id')->nullable();
            $table->integer('organization_branch_id')->nullable();
            $table->integer('organization_city_id')->nullable();
            $table->integer('doctor_schedule_id')->nullable();
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
        Schema::dropIfExists('doctor_organization_branches');
    }
}
