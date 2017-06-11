<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //
    protected $fillable = 
    ['title','content','tag','company','link','description','author','cover','established_time','created_at'];
}
