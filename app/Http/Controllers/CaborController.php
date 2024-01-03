<?php

namespace App\Http\Controllers;

use App\Models\Cabor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Str;


class CaborController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cabor = Cabor::latest()->simplePaginate(10);

        return view('pages.cabors.index', compact('cabor'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cabor = Cabor::all();
        
        return view('pages.cabors.create', compact('cabor'));
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
            'image' => 'required',
        ]);

        $slug = Str::slug($request->name, '-');

        $input = $request->all();

        $data_cabor = [
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $slug,
            
        ];

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('cabor', $request->image);
            $data_cabor['image'] = $image;
        }

        
    
        cabor::create($data_cabor);

        return redirect()->route('cabors.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cabor  $cabor
     * @return \Illuminate\Http\Response
     */
    public function show(Cabor $cabor)
    {
        return view('pages.cabors.show', compact('cabor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cabor  $cabor
     * @return \Illuminate\Http\Response
     */
    public function edit(Cabor $cabor, $id)
    {
        $cabor = Cabor::all();
        $edit = Cabor::where('id', $id)->first();
        
        return view('pages.cabors.edit', compact('cabor', 'edit'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cabor  $cabor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cabor $cabor, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $cabor = Cabor::findorfail($id);

        $slug = Str::slug($request->name, '-');

        $data_cabor = [
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $slug,
            
        ];
        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('cabor', $request->image);
            $data_cabor['image'] = $image;
            // dd($object['avatar']);
            if ($cabor->image) {
                FacadesFile::delete('./uploads/' . $cabor->image);
            }
        }

        $cabor->update($data_cabor);
        //dd($galery->toArray());
        return redirect()->route('cabors.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cabor  $cabor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cabor $cabor, $id)
    {
        $cabor->entry_number()->delete();
        $cabor->match_number()->delete();
        $cabor->classification()->delete();
        $cabor = Cabor::where('id', $id)->firstOrFail();
        FacadesFile::delete('./uploads/' . $cabor->image);
        // $cabor->members()->delete();
        $cabor->DELETE();

        return redirect()->route('cabors.index')
            ->with('success', 'Product deleted successfully');
    }

    public function FrontCabor()
    {
        $cabor = Cabor::latest()->get();

        return view('frontend.cabor.list', compact('cabor'));
    }

    public function FrontCaborDetail(Cabor $news, $slug)
    {
        $show = Cabor::where('slug', $slug)->first();
        $data['show'] = $show;
        $data['page_title'] = $show->name." - Peparprov 2023";
        $data['meta_title'] = $show->name;
        $data['meta_description'] = $show->description;
        $data['meta_image'] = asset('uploads/'.$show->image);
        // dd($slug);
        return view('frontend.cabor.detail', $data);
    }
}
