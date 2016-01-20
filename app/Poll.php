<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $rules = [];
    protected $fillable = [
        'state_id',
        'poll_name',
        'poll_start_date',
        'poll_end_date',
        'sample',
        'moe',
        'clinton',
        'sanders',
        'omalley',
        'undecided',
    ];
    protected $table = 'polls';

}
