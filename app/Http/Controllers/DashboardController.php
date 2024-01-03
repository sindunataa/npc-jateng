<?php

namespace App\Http\Controllers;

use App\Models\Cabor;
use App\Models\Contingent;
use App\Models\Entry_number;
use App\Models\Match_number;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        $match_number = Match_number::get();
        $count_match_number = $match_number->count();

        $entry_number = DB::table('entry_numbers')
        ->select('entry_numbers.*',DB::raw('count(DISTINCT contingent_id) as total_kota'), DB::raw('count(DISTINCT match_number_id) as total_match_number'))
        ->first();

        $members = DB::table('members')
        ->select('members.*', DB::raw('count(DISTINCT members.id) as total_atlet'))
        ->where('peserta', '=', 'atlet')
        ->first();

        $entry_numbers = Entry_number::with('cabor', 'contingent', 'match_number', 'classification')->limit(10)->get();

        // dd($entry_numbers->toArray());

        return view('pages.dashboard.admin', compact('match_number','count_match_number', 'entry_number', 'members', 'entry_numbers'));
    }

    public function kontingen()
    {
        $item = Cabor::all();
        $user_id = Auth::user()->id;
        $contingent = Contingent::where('user_id',$user_id)->first();
        $entry_number = DB::table('entry_numbers')
        ->select('entry_numbers.*',DB::raw('count(DISTINCT cabor_id) as total_cabor'), DB::raw('sum(jumlah) as total_atlet'), DB::raw('count(DISTINCT match_number_id) as total_match_number'))
        ->where('contingent_id', $contingent->id)
        ->first();

        $members = DB::table('members')
        ->select('members.*', DB::raw('count(DISTINCT members.id) as total_atlet'))
        ->where('contingent_id', $contingent->id)
        ->where('peserta', '=', 'atlet')
        ->first();

        // dd($match_number);

        return view('pages.dashboard.user', compact('item', 'entry_number', 'members'));
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
        //
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
    public function update(Request $request, $id)
    {
        //
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
