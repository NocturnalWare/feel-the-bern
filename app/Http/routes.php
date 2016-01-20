<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => function () {
    return view('welcome');
}]);

Route::get('/fixdata', function(){
	foreach(\App\Poll::where('state_id', 1)->get() as $poll){
		$poll->state_id = 15;
		$poll->save();
	}
	foreach(\App\Turnout::where('state_id', 1)->get() as $turnout){
		$turnout->state_id = 15;
		$turnout->save();
	}
})

Route::resource('turnouts', 'TurnoutsController');
Route::resource('polls', 'PollsController');
Route::post('polls/updatepoll', ['as' => 'updatepoll', 'uses' => 'PollsController@updatepoll']);
Route::get('polls/destroypoll/{id?}', ['as' => 'destroypoll', 'uses' => 'PollsController@destroypoll']);
