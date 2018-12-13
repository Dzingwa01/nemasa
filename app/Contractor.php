<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contractor extends BaseModel
{
    //
    protected $fillable = ['contractor_name','contact_person','sme_manager_name','landline','mobile','project_id'];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
