<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocioEconomicAllowablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('socio_economic_allowables', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->decimal('community_liason_officer_fee',15,2)->nullable();
            $table->decimal('interns_fee',15,2)->nullable();
            $table->decimal('graduates_fee',15,2)->nullable();
            $table->decimal('psc_community_members',15,2);
            $table->decimal('employment_relations_coordinator',15,2)->nullable();
            $table->decimal('hiv_awareness',15,2)->nullable();
            $table->decimal('business_desk_support_fee',15,2)->nullable();
            $table->decimal('sme_tender_manager_fee',15,2)->nullable();
            $table->decimal('local_procurement_management_fee',15,2)->nullable();

            $table->decimal('contractor_attendance_profit',15,2)->nullable();
            $table->decimal('contractor_technical_mentor_fee',15,2)->nullable();
            $table->decimal('sme_prelim_general_allowance',15,2)->nullable();
            $table->uuid('project_id',15,2)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socio_economic_allowables');
    }
}
