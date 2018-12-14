<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends BaseModel
{
    //
     protected $fillable = ['client_name','name','district','local_municipality','ward','metropolitan','scope_of_work','contract_sum_excl','preliminary_general','contigency_allowable',
         'socio_economic_allowables','start_date','end_date','user_id','creator_id','work_budget','targeted_sme_participation_fee','sme_package_value_target','targeted_procument_value',
         'local_procument_targeted_value'];

     public function contractors(){
        return $this->hasMany(Contractor::class);
     }

     public function socios(){
         return $this->hasMany(SocioEconomicAllowable::class);
     }
    public function sme_procs(){
        return $this->hasMany(SMEProcurementPlan::class);
    }
}
