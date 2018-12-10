<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends BaseModel
{
    //
     protected $fillable = ['name','location','information','start_date','end_date','user_id','creator_id'];
}
