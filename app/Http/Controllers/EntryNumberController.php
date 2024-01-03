<?php

namespace App\Http\Controllers;

use App\Models\Cabor;
use App\Models\Classification;
use App\Models\Contingent;
use App\Models\Entry_number;
use App\Models\Match_number;
use App\Models\User;
use Illuminate\Http\Request;
use Storage;
use Validator;
use File;
// use Auth;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\DB;

class EntryNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_jenis_klasifikasi($id)
    {
        $data = DB::table('classifications')
        ->select('classifications.type as type')
        ->join('cabors', 'cabors.id', '=', 'classifications.cabor_id')
        ->groupBy('classifications.type')
        ->where('classifications.cabor_id',$id)
        ->get();
        return response()->json($data);
    }
    public function get_classification(Request $request)
    {
        $data = DB::table('classifications')
        ->select('classifications.*')
        ->where('classifications.cabor_id',$request->cabor_id)
        ->where('classifications.type',$request->status)
        ->get();
        return response()->json($data);
    }
    public function get_member(Request $request)
    {
        $data = DB::table('member_match_number')
        ->select('member_match_number.*')
        ->where('member_match_number.match_number_id',$request->match_number_id)
        ->get();
        return response()->json($data);
    }
    public function get_gender(Request $request)
    {
        $data = DB::table('match_numbers')
        ->select('match_numbers.*')
        ->groupBy('match_numbers.gender')
        ->where('match_numbers.cabor_id',$request->cabor_id)
        ->where('match_numbers.type',$request->status)
        ->where('match_numbers.classification_id',$request->classification_id)
        ->get();
        return response()->json($data);
    }
    public function get_match_number(Request $request)
    {
        $data = DB::table('match_numbers')
        ->select('match_numbers.*')
        ->where('match_numbers.cabor_id',$request->cabor_id)
        ->where('match_numbers.type',$request->status)
        ->where('match_numbers.classification_id',$request->classification_id)
        ->where('match_numbers.gender',$request->gender)
        ->get();
        return response()->json($data);
    }
    public function admin()
    {
        $item = Cabor::all();
        $user_id = Auth::user()->id;
        $contingent = contingent::where('user_id',$user_id)->first();
        $entry_number = Entry_number::with('cabor', 'contingent', 'match_number', 'classification')->get();
        // $group = DB::table('entry_numbers')
        // ->select('*',DB::raw('sum(jumlah) as total_atlet'),DB::raw('count(jumlah) as kota'))
        // ->groupBy('cabor_id', 'match_number_id','gender')
        // ->get();
        // dd($group);
        return view('pages.entry_number.admin', compact('item', 'entry_number'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function result()
    {
        $item = Cabor::all();
        $user_id = Auth::user()->id;
        $contingent = contingent::where('user_id',$user_id)->first();
        // $entry_number = Entry_number::with('cabor', 'contingent', 'match_number', 'classification')->paginate(10);
        $entry_number = DB::table('entry_numbers')
        ->select('entry_numbers.*','cabors.name as cabor','match_numbers.name as nomor','classifications.name as klasifikasi',DB::raw('sum(jumlah) as total_atlet'),DB::raw('count(jumlah) as kota'))
        ->join('cabors', 'cabors.id', '=', 'entry_numbers.cabor_id')
        ->join('match_numbers', 'match_numbers.id', '=', 'entry_numbers.match_number_id')
        ->join('classifications', 'classifications.id', '=', 'entry_numbers.classification_id')
        ->groupBy('entry_numbers.cabor_id','entry_numbers.classification_id', 'entry_numbers.match_number_id','gender')
        ->get();
        // dd($entry_number);
        return view('pages.entry_number.result', compact('item', 'entry_number'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function see_all()
    {
        $item = Cabor::all();
        $user_id = Auth::user()->id;
        $contingent = contingent::where('user_id',$user_id)->first();
        // $entry_number = Entry_number::with('cabor', 'contingent', 'match_number', 'classification')->paginate(10);
        $entry_number = DB::table('match_numbers')
        ->select('match_numbers.*','cabors.name as cabor','match_numbers.name as nomor','classifications.name as klasifikasi',DB::raw('sum(jumlah) as total_atlet'),DB::raw('count(jumlah) as kota'))
        // ->select('entry_numbers.*','cabors.name as cabor','match_numbers.name as nomor','classifications.name as klasifikasi',DB::raw('sum(jumlah) as total_atlet'),DB::raw('count(jumlah) as kota'))
        ->join('cabors', 'cabors.id', '=', 'match_numbers.cabor_id')
        ->leftjoin('entry_numbers', 'match_numbers.id', '=', 'entry_numbers.match_number_id')
        // ->join('match_numbers', 'match_numbers.id', '=', 'entry_numbers.match_number_id')
        ->join('classifications', 'classifications.id', '=', 'match_numbers.classification_id')
        ->groupBy('match_numbers.cabor_id','match_numbers.classification_id','match_numbers.id','gender')
        ->get();
        // dd($entry_number);
        return view('pages.entry_number.see_all', compact('item', 'entry_number'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function index()
    {
        $item = Cabor::all();
        $user_id = Auth::user()->id;
        $contingent = contingent::where('user_id',$user_id)->first();
        $entry_number = Entry_number::where('contingent_id',$contingent->id)->with('cabor', 'contingent', 'match_number', 'classification')->get();
        // $user = Auth::user()->contingent->image;

        // dd($user);

        return view('pages.entry_number.index', compact('item', 'entry_number'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $match_numbers = Match_number::all();
        $classifications = Classification::all();
        $contingents = Contingent::all();
        $cabors = Cabor::all();
        

        return view('pages.entry_number.create', compact('match_numbers', 'classifications', 'contingents', 'cabors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'status' => 'required',
            'gender' => 'required',
            'jumlah' => 'required',
            'match_number_id' => 'required',
            'classification_id' => 'required',
            'cabor_id' => 'required',
            'status_classification' => 'required',
        );
        $validator = Validator::make($request->all(), $rules, $messages = [
            'required' => ':attribute harus diisi.',
            'file' => 'The :attribute must be a file.',
            'mimes' => 'The :attribute must be a file of type: :values.',
            'max' => 'Maksimal ukuran 10 mb.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with(['notif_status' => '0', 'notif' => 'Insert data failed.'])
                ->withInput();
        }
        
        $user_id = Auth::user()->id;
        $contingent = contingent::where('user_id',$user_id)->first();
        $object = array(
            'status'  => $request->status,
            'gender'   => $request->gender,
            'jumlah' => $request->jumlah,
            'match_number_id' => $request->match_number_id,
            'classification_id' => $request->classification_id,
            'cabor_id' => $request->cabor_id,
            'status_classification' => $request->status_classification,
            'contingent_id' => $contingent->id,
        );
        // dd($contingent_id->id);
        Entry_number::create($object);

        return redirect()->route('entry_numbers.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entry_number  $entry_number
     * @return \Illuminate\Http\Response
     */
    public function show(Entry_number $entry_number)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\entry_number  $entry_number
     * @return \Illuminate\Http\Response
     */
    public function edit(Entry_number $entry_number, $id)
    {
        $match_numbers = Match_number::all();
        $classifications = Classification::all();
        $contingents = Contingent::all();
        $cabors = Cabor::all();
        $edit = Entry_number::where('id', $id)->first();

        return view('pages.entry_number.edit', compact( 'match_numbers', 'classifications', 'contingents', 'cabors', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\entry_number  $entry_number
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entry_number $entry_number, $id)
    {
        $request->validate([
            'status' => 'required',
            'gender' => 'required',
            'jumlah' => 'required',
            'match_number_id' => 'required',
            'classification_id' => 'required',
            'contingent_id' => 'required',
            'cabor_id' => 'required',
        ]);

        $input = $request->all();
        $entry_number = Entry_number::findorfail($id);

        $entry_number->update($input);
        //dd($galery->toArray());
        return redirect()->route('entry_numbers.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\entry_number  $entry_number
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entry_number $entry_number)
    {
        // $entry_number->members()->delete();
        $entry_number->DELETE();

        return redirect()->route('entry_numbers.index')
            ->with('success', 'Product deleted successfully');
    }
}
