<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Poll;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PollsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Poll::create($request->except('_token'));
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatepoll(Request $request)
    {
        $data = $request->except('poll_id', '_token');

        //fix dates from datepicker
        $data['poll_start_date'] = \Carbon::parse($data['poll_start_date']);
        $data['poll_end_date'] = \Carbon::parse($data['poll_end_date']);

        //calc undecided
        $data['undecided'] = 100 - ($data['clinton'] + $data['omalley'] + $data['sanders']);

        if($data['undecided'] < 0 || $data['undecided'] > 100){
            return redirect()->route('home');
        }

        Poll::find($request->input('poll_id'))->update($data);
        
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
