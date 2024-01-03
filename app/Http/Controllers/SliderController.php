<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File as FacadesFile;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->simplePaginate(10);

        return view('pages.sliders.index', compact('sliders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.sliders.create');
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
            'url' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
        ]);

        $input = $request->all();

        $data_sliders = [
            'name' => $request->name,
            'excerpt' => $request->excerpt,
            'url' => $request->url,
        ];

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('sliders', $request->image);
            $data_sliders['image'] = $image;
        }

        // dd($data_news);
    
        Slider::create($data_sliders);

        return redirect()->route('sliders.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider, $id)
    {
        $edit = Slider::where('id', $id)->first();
        
        return view('pages.sliders.edit', compact('edit'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $sliders, $id)
    {
        $request->validate([
            'name' => 'required',
            'excerpt' => 'required',
            'url' => 'required',

        ]);

        $sliders = Slider::findorfail($id);

        $data_sliders = [
            'name' => $request->name,
            'excerpt' => $request->excerpt,
            'url' => $request->url,
        ];

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('sliders', $request->image);
            $data_sliders['image'] = $image;
            // dd($object['avatar']);
            if ($sliders->image) {
                FacadesFile::delete('./uploads/' . $sliders->image);
            }
        }

        $sliders->update($data_sliders);

        //dd($galery->toArray());

        return redirect()->route('sliders.index')
            ->with('success', 'Product updated succes sfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::where('id', $id)->firstOrFail();
        FacadesFile::delete('./uploads/' . $slider->image);
        $slider->DELETE();

        return redirect()->route('sliders.index')
            ->with('success', 'Product deleted successfully');
    }
}
