<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocioEconomicAllowable extends BaseModel
{
    //
    protected $fillable = ['community_liason_officer_fee','interns_fee','graduates_fee','psc_community_members','employment_relations_coordinator','hiv_awareness','business_desk_support_fee',
        'sme_tender_manager_fee','local_procurement_management_fee','contractor_attendance_profit','contractor_technical_mentor_fee',
        'sme_prelim_general_allowance','project_id'];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
