<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function getFullNameAttribute()
	{
	    return $this->name.' '.$this->last_name;
	}
}
