<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Str;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venues = Venue::latest()->get();

        return view('pages.venues.index', compact('venues'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.venues.create');
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
            'excerpt' => 'required',
            'status' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
        ]);

        $slug = Str::slug($request->name, '-');

        $input = $request->all();

        $data_venues = [
            'name' => $request->name,
            'slug' => $slug,
            'excerpt' => $request->excerpt,
            'status' => $request->status,
            'content' => $request->content,
        ];

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('venues', $request->image);
            $data_venues['image'] = $image;

            Venue::create($data_venues);

            return redirect()->route('venues.index')
                            ->with('success','Product created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function show(Venue $venue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function edit(Venue $venues, $id)
    {
        $venues = Venue::all();
        $edit = Venue::where('id', $id)->first();
        
        
        return view('pages.venues.edit', compact('venues', 'edit'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venue $venues, $id)
    {
        $request->validate([
            'name' => 'required',
            'excerpt' => 'required',
            'status' => 'required',
            'content' => 'required',
        ]);

        $venues = Venue::findorfail($id);

        $slug = Str::slug($request->name, '-');
        
        $data_venues = [
            'name' => $request->name,
            'slug' => $slug,
            'excerpt' => $request->excerpt,
            'status' => $request->status,
            'content' => $request->content,
        ];

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('venues', $request->image);
            $data_venues['image'] = $image;
            // dd($object['avatar']);
            if ($venues->image) {
                FacadesFile::delete('./uploads/' . $venues->image);
            }
        }

        $venues->update($data_venues);

        //dd($galery->toArray());

        return redirect()->route('venues.index')
            ->with('success', 'Product updated succes sfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venue = Venue::where('id', $id)->firstOrFail();
        FacadesFile::delete('./uploads/' . $venue->image);
        $venue->DELETE();

        return redirect()->route('venues.index')
            ->with('success', 'Product deleted successfully');
    }
}
