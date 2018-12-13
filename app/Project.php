<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends BaseModel
{
    //
     protected $fillable = ['name','district','local_municipality','ward','metropolitan','scope_of_work','contract_sum_excl','preliminary_general','contigency_allowable','socio_economic_allowables','start_date','end_date','user_id','creator_id'];

     public function contractors(){
        return $this->hasMany(Contractor::class);
     }
}
