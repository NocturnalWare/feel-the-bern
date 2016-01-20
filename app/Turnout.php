<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turnout extends Model
{
    protected $rules = [];
    protected $fillable = [
	    'state_id',
        'turnout_2004',
        'turnout_2008',
    ];
    protected $table = 'turnouts';
}
