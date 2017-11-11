<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    // get ISO 860 format from timestamp
    public function getIso(){
        return Carbon::createFromTimestamp($this->date)->toIso8601String(); 
    }
}
