<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::latest()->simplePaginate(10);

        return view('pages.news.index', compact('news'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('pages.news.create');
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
            'title' => 'required',
            'excerpt' => 'required',
            'status' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
            'published_at' => 'required',
        ]);
        
        $slug = Str::slug($request->title, '-');
        

        $input = $request->all();

        $data_news = [
            'title' => $request->title,
            'slug' => $slug,
            'excerpt' => $request->excerpt,
            'status' => $request->status,
            'content' => $request->content,
            'published_at' => $request->published_at,
        ];

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('news', $request->image);
            $data_news['image'] = $image;
        }

        // dd($data_news);
    
        News::create($data_news);

        return redirect()->route('news.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function show(news $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(news $news, $id)
    {
        $news = News::all();
        $edit = News::where('id', $id)->first();
        
        
        return view('pages.news.edit', compact('news', 'edit'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news, $id)
    {
        $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'status' => 'required',
            'content' => 'required',
            'published_at' => 'required',

        ]);

        $news = News::findorfail($id);


        $slug = Str::slug($request->title, '-');
        

        $data_news = [
            'title' => $request->title,
            'slug' => $slug,
            'excerpt' => $request->excerpt,
            'status' => $request->status,
            'content' => $request->content,
            'published_at' => $request->published_at,
        ];

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('news', $request->image);
            $data_news['image'] = $image;
            // dd($object['avatar']);
            if ($news->image) {
                FacadesFile::delete('./uploads/' . $news->image);
            }
        }

        $news->update($data_news);

        //dd($galery->toArray());

        return redirect()->route('news.index')
            ->with('success', 'Product updated succes sfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = News::where('id', $id)->firstOrFail();
        FacadesFile::delete('./uploads/' . $new->image);
        $new->DELETE();

        return redirect()->route('news.index')
            ->with('success', 'Product deleted successfully');
    }
}
