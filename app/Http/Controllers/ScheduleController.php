<?php

namespace App\Http\Controllers;

use App\Models\Cabor;
use App\Models\Competition;
use App\Models\Schedule;
use App\Models\Venue;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item1 = Competition::all();
        $item2 = Venue::all();
        $item3 = Cabor::all();
        $schedules = Schedule::with('venue','competition', 'cabor')->latest()->get();

        return view('pages.schedules.index', compact('schedules', 'item1', 'item2', 'item3'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    
    {
        $competitions = Competition::all();
        $venues = Venue::all();
        $cabors = Cabor::all();
        
        return view('pages.schedules.create', compact('competitions', 'venues', 'cabors'));
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
            'competition_id' => 'required',
            'venue_id' => 'required',
            'cabor_id' => 'required',
            'title' => 'required',
            'date' => 'required',
            'time' => 'required',
            'content' => 'required',
        ]);

        $input = $request->all();
    
        Schedule::create($input);

        return redirect()->route('schedules.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedules, $id)
    {
        $item1 = Competition::get();
        $item2 = Venue::get();
        $item3 = Cabor::get();
        $schedules = Schedule::with('venue','competition', 'cabor')->get();
        $edit = Schedule::where('id', $id)->first();
        // dd($classification[1]->cabor->name);
        
        return view('pages.schedules.edit', compact('item1', 'item2', 'item3' ,'schedules', 'edit'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedules, $id)
    {
        $request->validate([
            'competition_id' => 'required',
            'venue_id' => 'required',
            'cabor_id' => 'required',
            'title' => 'required',
            'date' => 'required',
            'time' => 'required',
            'content' => 'required',

        ]);
        
        $input = $request->all();
        $schedules = Schedule::findorfail($id);

        $schedules->update($input);
        //dd($galery->toArray());
        return redirect()->route('schedules.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->DELETE();
        // dd($classification);

        return redirect()->route('schedules.index')
            ->with('success', 'Product deleted successfully');
    }

    public function front()
    {
        $item1 = Competition::all();
        $item2 = Venue::all();
        $item3 = Cabor::all();
        $schedules = Schedule::with('venue','competition', 'cabor')->latest()->get();

        return view('frontend.schedule.index', compact('schedules', 'item1', 'item2', 'item3'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
