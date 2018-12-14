<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyPprojectsAddBudget extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            //
            $table->decimal('work_budget',15,2)->default(0);
            $table->decimal('targeted_sme_participation_fee',4,2)->default(30);
            $table->decimal('sme_package_value_target',15,2)->default(0);
            $table->decimal('targeted_procument_value',15,2)->default(0);
            $table->decimal('local_procument_targeted_value',15,2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            //
        });
    }
}
