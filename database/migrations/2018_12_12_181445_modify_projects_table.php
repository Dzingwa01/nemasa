<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyProjectsTable extends Migration
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
            $table->text('scope_of_work')->nullable();
            $table->decimal('contract_sum_excl')->nullable();
            $table->decimal('preliminary_general')->nullable();
            $table->decimal('contigency_allowable')->nullable();
            $table->decimal('socio_economic_allowables')->nullable();
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
            $table->dropColumn('scope_of_work');
            $table->dropColumn('contract_sum');
            $table->dropColumn('preliminary_general');
            $table->dropColumn('contigency_allowable');
            $table->dropColumn('socio_economic_allowables');
        });
    }
}
