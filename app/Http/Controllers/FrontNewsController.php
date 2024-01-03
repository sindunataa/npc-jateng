<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class FrontNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::latest()->paginate(2);
        $data['news'] = $news;
        $data['page_title'] = 'Berita'." - Peparprov 2023";
        $data['meta_title'] = 'Berita Terkini - Peparprov 2023';

        return view('frontend.berita.list', $data)
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
    public function show(News $news, $slug)
    {
        $show = News::where('slug', $slug)->first();
        $data['show'] = $show;
        $data['page_title'] = $show->title." - Peparprov 2023";
        $data['meta_title'] = $show->title;
        $data['meta_description'] = $show->excerpt;
        $data['meta_image'] = asset('uploads/'.$show->image);
        // dd($slug);
        return view('frontend.berita.detail', $data);
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
