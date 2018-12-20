<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialistProcurement extends BaseModel
{
    //
    protected $fillable = ['package_number','package_description','cibd_grade','number_of_targetted_sms','total_sme_package_est_budget'
        ,'tender_date','tender_briefing_date','tender_closing_date','tender_adjudication_report_date','tender_review_report_date',
        'tender_award_date','name_of_sme_awarded','sme_black_ownership','sme_award_value','sme_work_start_date',
        'sme_work_completion_date','sme_further_sub_contracting','project_id'];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
