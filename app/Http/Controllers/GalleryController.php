<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File as FacadesFile;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::latest()->simplePaginate(10);

        return view('pages.galleries.index', compact('galleries'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.galleries.create');
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
            'url' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
        ]);

        $input = $request->all();

        $data_galleries = [
            'name' => $request->name,
            'url' => $request->url,
        ];

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('galleries', $request->image);
            $data_galleries['image'] = $image;
        }

        // dd($data_news);
    
        Gallery::create($data_galleries);

        return redirect()->route('galleries.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery, $id)
    {
        $edit = Gallery::where('id', $id)->first();
        
        return view('pages.galleries.edit', compact('edit'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery, $id)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required',

        ]);

        $galleries = Gallery::findorfail($id);

        $data_galleries = [
            'name' => $request->name,
            'url' => $request->url,
        ];

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('galleries', $request->image);
            $data_galleries['image'] = $image;
            // dd($object['avatar']);
            if ($galleries->image) {
                FacadesFile::delete('./uploads/' . $galleries->image);
            }
        }

        $galleries->update($data_galleries);

        //dd($galery->toArray());

        return redirect()->route('galleries.index')
            ->with('success', 'Product updated succes sfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::where('id', $id)->firstOrFail();
        FacadesFile::delete('./uploads/' . $gallery->image);
        $gallery->DELETE();

        return redirect()->route('galleries.index')
            ->with('success', 'Product deleted successfully');
    }
}
