<?php

namespace App\Http\Controllers;

use App\Models\Cabor;
use App\Models\Classification;
use Illuminate\Http\Request;

class ClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Cabor::all();
        $classification = Classification::with('cabor')->get();

        return view('pages.classifications.index', compact('classification', 'item'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cabors = Cabor::all();
        
        return view('pages.classifications.create', compact('cabors'));
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
        ]);

        $input = $request->all();
    
        Classification::create($input);

        return redirect()->route('classifications.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\classification  $classification
     * @return \Illuminate\Http\Response
     */
    public function show(Classification $classification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\classification  $classification
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $item = Cabor::get();
        $classification = Classification::with('cabor')->get();
        $edit = Classification::where('id', $id)->first();
        // dd($classification[1]->cabor->name);
        
        return view('pages.classifications.edit', compact('item' ,'classification', 'edit'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\classification  $classification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classification $classification, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'cabor_id' => 'required',
            'type' => 'required',

        ]);
        
        $input = $request->all();
        $classification = Classification::findorfail($id);

        $classification->update($input);
        //dd($galery->toArray());
        return redirect()->route('classifications.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\classification  $classification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classification $classification)
    {
        $classification->DELETE();
        // dd($classification);

        return redirect()->route('classifications.index')
            ->with('success', 'Product deleted successfully');
    }
}
