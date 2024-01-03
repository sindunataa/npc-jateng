<?php

namespace App\Http\Controllers;

use App\Models\Contingent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KlasemenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['klasemen'] = DB::table('contingents')
        ->leftJoin('members', 'contingents.id', '=', 'members.contingent_id')
        ->leftJoin('member_competitions', 'members.id', '=', 'member_competitions.member_id')
        
        ->select('contingents.*',
            DB::raw('COUNT(CASE WHEN member_competitions.medal = "gold" THEN 1 END) as gold_count'),
            DB::raw('COUNT(CASE WHEN member_competitions.medal = "silver" THEN 1 END) as silver_count'),
            DB::raw('COUNT(CASE WHEN member_competitions.medal = "bronze" THEN 1 END) as bronze_count')
        )
        ->where('contingents.id','!=',36)
        ->groupBy('contingents.id')
        ->orderBy('gold_count', 'desc')
        ->orderBy('silver_count', 'desc')
        ->orderBy('bronze_count', 'desc')
        ->get();

        // dd($data->toArray());

        
        return view('frontend.klasemen.index', $data);
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
