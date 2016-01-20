<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StateList extends Model
{
	protected $rules = [];
	protected $fillable = ['state_abbr', 'state_name'];
	protected $table = 'state_list';

	public function turnout(){
		return $this->hasOne('\App\Turnout', 'state_id', 'id');
	}
	
	public function polls(){
		return $this->hasMany('\App\Poll', 'state_id', 'id');
	}

    public function candidateAvg($candidate){
    	$sum = \App\Poll::where('state_id', $this->id)->sum($candidate);
    	$parts = \App\Poll::where('state_id', $this->id)->count();

    	if($parts == 0){
    		$parts = 1;
    	}
    	return $sum / $parts;
    }

    public function turnoutByYear($year){
    	switch ($year) {
    		case '2004':
    			return \App\Turnout::where('state_id', $this->id)->pluck('turnout_2004');
    			break;
    		case '2008':
    			return \App\Turnout::where('state_id', $this->id)->pluck('turnout_2008');
    			break;
    		case '2016':
    			return ($this->turnoutByYear('2004') + $this->turnoutByYear('2008')) / 2;
    			break;
    		
    		default:
    			# code...
    			break;
    	}
    }

    public function estimateUndecidedVotes($candidate, $year){
    	return round((($this->candidateAvg('undecided')/100) * ($this->turnoutByYear($year))) * ($this->candidateAvg($candidate)/100));
    }

    public function estimateVotes($candidate, $year){
    	return ($this->candidateAvg($candidate)/100) * ($this->turnoutByYear($year));
    }

    public function estimateVictory($candidate1, $candidate2){
    	return ($this->estimateVotes($candidate1, '2016') + $this->estimateUndecidedVotes($candidate1, '2016')) - ($this->estimateVotes($candidate2, '2016') + $this->estimateUndecidedVotes($candidate2, '2016'));
    }
}
