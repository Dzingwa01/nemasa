<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSMEProcurementPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('s_m_e_procurement_plans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('package_number')->nullable();
            $table->text('package_description')->nullable();
            $table->integer('number_of_targetted_sms')->nullable();
            $table->decimal('total_sme_package_est_budget',15,2)->default(0);
            $table->string('cibd_grade')->nullable();

            $table->date('tender_date')->nullable();
            $table->date('tender_briefing_date')->nullable();
            $table->date('tender_closing_date')->nullable();
            $table->date('tender_adjudication_report_date')->nullable();
            $table->date('tender_review_report_date')->nullable();
            $table->date('tender_award_date')->nullable();

            $table->string('name_of_sme_awarded')->nullable();
            $table->string('sme_black_ownership')->nullable();
            $table->string('sme_award_value')->nullable();
            $table->date('sme_work_start_date')->nullable();
            $table->date('sme_work_completion_date')->nullable();
            $table->text('sme_further_sub_contracting')->nullable();
            $table->uuid('project_id');
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
        Schema::dropIfExists('s_m_e_procurement_plans');
    }
}
