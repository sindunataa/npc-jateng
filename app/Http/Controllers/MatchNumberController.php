<?php

namespace App\Http\Controllers;

use App\Models\Cabor;
use App\Models\Classification;
use App\Models\Classification as ModelsClassification;
use App\Models\Match_number;
use Illuminate\Http\Request;

class MatchNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cabors = Cabor::all();
        $classifications = Classification::all();
        $match_numbers = Match_number::with('cabor','classification')->get();
        // dd($match_numbers[1]->cabor->name);
        $data['cabors'] = $cabors;
        $data['match_numbers'] = $match_numbers;
        $data['classifications'] = $classifications;
        return view('pages.match_numbers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cabors = Cabor::all();
        
        return view('pages.match_numbers.create', compact('cabors'));
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
            'description' => 'required',
            'cabor_id' => 'required',
            'type' => 'required',
            'gender' => 'required',
            'classification_id'
        ]);

        $input = $request->all();
    
        Match_number::create($input);

        return redirect()->route('match_numbers.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Match_number  $match_number
     * @return \Illuminate\Http\Response
     */
    public function show(Match_number $match_number)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Match_number  $match_number
     * @return \Illuminate\Http\Response
     */
    public function edit(Match_number $match_number, $id)
    {
        $cabors = Cabor::all();
        $classifications = Classification::all();
        $match_numbers = Match_number::all();
        $edit = Match_number::where('id', $id)->first();
        
        
        return view('pages.match_numbers.edit', compact('cabors','classifications', 'match_numbers', 'edit'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Match_number  $match_number
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Match_number $match_numbers, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'cabor_id' => 'required',
            'type' => 'required',
            'gender' => 'required',
            'classification_id',

        ]);
        
        $input = $request->all();
        $match_numbers = Match_number::findorfail($id);

        $match_numbers->update($input);
        //dd($galery->toArray());
        return redirect()->route('match_numbers.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Match_number  $match_number
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match_number $match_number)
    {
        $match_number->DELETE();
        // dd($classification);

        return redirect()->route('match_numbers.index')
            ->with('success', 'Product deleted successfully');
    }
}
