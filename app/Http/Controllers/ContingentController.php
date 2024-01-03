<?php

namespace App\Http\Controllers;

use App\Models\Contingent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File as FacadesFile;

class ContingentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contingent = User::all();
        $contingents = Contingent::with('user', 'entry_number', 'member')->where('id','!=',36)->latest()->get();

        return view('pages.contingents.index', compact('contingents', 'contingent'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.contingents.create');
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
            'address' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
        ]);

        $input = $request->all();

        $data_contingent = [
            'name' => $request->name,
            'address' => $request->address,
            'kota' => $request->kota,
        ];
        
        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('contingents', $request->image);
            $data_contingent['image'] = $image;
        }

        $data_user = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => 'contingent',
            'password' => Hash::make($request->password),
        ];
        
        $user = User::create($data_user);
        
        $data_contingent['user_id'] = $user->id;

        

        Contingent::create($data_contingent);


        return redirect()->route('contingents.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contingent  $contingent
     * @return \Illuminate\Http\Response
     */
    public function show(Contingent $contingent)
    {
        $contingents = User::all();
        $contingent = Contingent::all();

        return view('pages.contingents.show', compact('contingent', 'contingents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contingent  $contingent
     * @return \Illuminate\Http\Response
     */
    public function edit(Contingent $contingent, $id)
    {
        $contingents = User::all();
        $contingent = Contingent::all();
        $edit = Contingent::where('id', $id)->first();

        return view('pages.contingents.edit', compact('contingent', 'contingent', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contingent  $contingent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contingent $contingent, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        $input = $request->all();
        $contingent = Contingent::findorfail($id);

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('contingents', $request->image);
            $object['image'] = $image;
            // dd($object['avatar']);
            if ($contingent->image) {
                FacadesFile::delete('./uploads/' . $contingent->image);
            }
        }


        $contingent->update($input);
        //dd($galery->toArray());
        return redirect()->route('contingents.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contingent  $contingent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contingent = Contingent::where('id', $id)->firstOrFail();
        FacadesFile::delete('./uploads/' . $contingent->image);
        $contingent->member()->delete();
        $contingent->entry_number()->delete();
        $contingent->user()->delete();
        $contingent->DELETE();
        

        return redirect()->route('contingents.index')
            ->with('success', 'Product deleted successfully');
    }
}
