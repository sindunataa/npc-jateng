<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Str;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $downloads = Download::latest()->simplePaginate(10);

        return view('pages.downloads.index', compact('downloads'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.downloads.create');
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
            'path' => 'required|mimes:pdf,doc,docx,xls,xlsx',
            'published_at' => 'required',
        ]);
        

        $input = $request->all();

        $data_download = [
            'title' => $request->title,
            'published_at' => $request->published_at,
        ];

        if ($request->has('path')) {
            $path = Storage::disk('uploads')->put('files', $request->path);
            $data_download['path'] = $path;
        }

        // dd($data_news);
    
        Download::create($data_download);

        return redirect()->route('downloads.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function show(Download $download)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function edit(Download $download, $id)
    {
        $download = Download::all();
        $edit = Download::where('id', $id)->first();
        
        
        return view('pages.downloads.edit', compact('download', 'edit'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Download $download, $id)
    {
        $request->validate([
            'title' => 'required',
            'published_at' => 'required',

        ]);

        $download = Download::findorfail($id);
        

        $data_download = [
            'title' => $request->title,
            'published_at' => $request->published_at,
        ];

        if ($request->has('file')) {
            $file = Storage::disk('uploads')->put('files', $request->file);
            $data_download['file'] = $file;
            // dd($object['avatar']);
            if ($download->file) {
                FacadesFile::delete('./uploads/' . $download->file);
            }
        }

        $download->update($data_download);

        //dd($galery->toArray());

        return redirect()->route('downloads.index')
            ->with('success', 'Product updated succes sfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $download = Download::where('id', $id)->firstOrFail();
        FacadesFile::delete('./uploads/' . $download->file);
        $download->DELETE();

        return redirect()->route('news.index')
            ->with('success', 'Product deleted successfully');
    }

    public function front()
    {        
        $downloads = Download::latest()->paginate(10);
        $data['downloads'] = $downloads;
        $data['page_title'] = 'Download File'." - Peparprov 2023";
        $data['meta_title'] = 'Download - Peparprov 2023';

        return view('frontend.download.index', $data)
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function download($id)
    {
        $dokumen = Download::find($id);

        if (!$dokumen) {
            return redirect()->route('FrontDownload')->with('error', 'Dokumen tidak ditemukan.');
        }

        $pathToFile = storage_path('uploads/' . $dokumen->path);

        return response()->download($pathToFile, $dokumen->title);
    }

}
