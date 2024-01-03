<?php

namespace App\Http\Controllers;

use App\Models\Cabor;
use App\Models\Competition;
use App\Models\Match_number;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function get_matchnumber(Request $request)
    {
        $data = DB::table('match_numbers')
        ->select('match_numbers.*')
        ->where('match_numbers.cabor_id',$request->cabor_id)
        ->where('match_numbers.type',$request->type)
        ->where('match_numbers.gender',$request->gender)
        ->get();
        return response()->json($data);
    }

    public function get_member(Request $request)

    {
        $data = DB::table('member_match_number')
        ->select('member_match_number.*', 'members.*')
        ->join('members', 'member_match_number.member_id', '=', 'members.id')
        ->where('member_match_number.match_number_id',$request->match_number_id)
        ->get();
        
        return response()->json($data);
    }

    public function get_member_edit(Request $request)

    {
        $data = DB::table('member_match_number')
        ->select('member_match_number.*', 'members.*')
        ->join('members', 'member_match_number.member_id', '=', 'members.id')
        ->where('member_match_number.match_number_id',$request->match_number_id)
        ->get();
        
        return response()->json($data);
    }

    public function index()
    {
        $item = Match_number::all();
        $competitions = Competition::with('match_number')->get();

        return view('pages.competitions.index', compact('competitions', 'item'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $match_numbers = Match_number::all();
        $cabors = Cabor::all();
        $members = Member::all();
        
        return view('pages.competitions.create', compact('match_numbers', 'members', 'cabors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'match_number_id' => 'required',
            'type' => 'required',
            'gender' => 'required',
            'classification' => 'required',
        ]);
        

        $input = $request->all();
// dd($input);
        $data_competition = [
            'name' => $request->name,
            'match_number_id' => $request->match_number_id,
            'type' => $request->type,
            'gender' => $request->gender,
            'classification' => $request->classification,
        ];
    

        $competitions_id = Competition::create($data_competition)->id;
        $competitions = Competition::findOrFail($competitions_id);

            foreach ($request->member_id as $key => $value) {
                # code...
                if ($request->member_id[$key] != null) {
                    $members[$key]['member_id']= $request->member_id[$key];
                    $members[$key]['medal'] = $request->medal[$key];
                }
            }
            $competitions->member()->attach($members);

        return redirect()->route('competitions.index')
                        ->with('success','Product created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function show(Competition $competition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Competition::where('id', $id)->with('member', 'match_number')->first();
        // $match_numbers = Match_number::all();
        $cabors = Cabor::all();
        $match_numbers = DB::table('match_numbers')
        ->select('match_numbers.*')
        ->where('match_numbers.cabor_id',$edit->match_number->cabor_id)
        ->where('match_numbers.type',$edit->match_number->type)
        ->where('match_numbers.gender',$edit->match_number->gender)
        ->get();

        $members = DB::table('member_match_number')
        ->select('member_match_number.*', 'members.*')
        ->join('members', 'member_match_number.member_id', '=', 'members.id')
        ->where('member_match_number.match_number_id',$edit->match_number_id)
        ->get();
        // dd($edit->toArray());
        
        return view('pages.competitions.edit', compact('edit' ,'match_numbers', 'cabors', 'members'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competition $competitions, $id)
    {
        $request->validate([
            'name' => 'required',
            'match_number_id' => 'required',
            'type' => 'required',
            'gender' => 'required',
            'classification' => 'required',

        ]);
        
        $competitions = Competition::findOrFail($id);
        $input = $request->all();

        $data_competition = [
            'name' => $request->name,
            'match_number_id' => $request->match_number_id,
            'type' => $request->type,
            'gender' => $request->gender,
            'classification' => $request->classification,
        ];

        
        

            foreach ($request->member_id as $key => $value) {
                # code...
                if ($request->member_id[$key] != null) {
                    $members[$key]['member_id']= $request->member_id[$key];
                    $members[$key]['medal'] = $request->medal[$key];
                }
            }
            $competitions->member()->sync($members);
    

        $competitions->update($data_competition);
        //dd($galery->toArray());
        
        return redirect()->route('competitions.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competition $competition)
    {
        $competition->DELETE();
        // dd($classification);

        return redirect()->route('competitions.index')
            ->with('success', 'Product deleted successfully');
    }
}
