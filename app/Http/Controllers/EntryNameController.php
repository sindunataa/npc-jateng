<?php

namespace App\Http\Controllers;

use App\Models\EntryName;
use App\Models\Entry_number;
use App\Models\Member;
use App\Models\Cabor;
use App\Models\Competition;
use App\Models\Contingent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Storage;
use Validator;
use File;
use ZipArchive;

class EntryNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['entry_names'] = Member::with(
        ['match_number' => function($query) {
            return $query->with('classification');
        },'cabor'])->where('contingent_id',Auth::user()->contingent->id)->get();
        $data['peserta_kuota'] = Member::where('contingent_id',Auth::user()->contingent->id)->where('status','kuota')->count();
        $data['peserta_non'] = Member::where('contingent_id',Auth::user()->contingent->id)->where('status','non kuota')->count();
        // $entry_number = Member::with('match_number')->where('contingent_id',Auth::user()->contingent->id)->firstOrfail();
        $entry_number = DB::table('members')
        ->select(DB::raw('count(member_match_number.match_number_id) as total_cabor'))
        ->join('member_match_number', 'members.id', '=', 'member_match_number.member_id')
        ->where('members.contingent_id', Auth::user()->contingent->id)
        ->first();
        $kuota = Contingent::where('id',Auth::user()->contingent->id)->firstOrfail();
        $data['kuota'] = $kuota->quota;
        $data['entry_number'] = $entry_number->total_cabor;
        // dd($data['entry_names']->toArray());

        return view('pages.entry_name.index', $data);
    }
    public function admin()
    {
        $data['entry_names'] = Member::with(
            ['match_number' => function($query) {
                return $query->with('classification');
            },'cabor','contingent', 'competition'])
            ->get();
        

        // dd($data['entry_names']->toArray());

        return view('pages.entry_name.admin', $data);
    }
    public function result()
    {
        $data['entry_names'] = Member::with('match_number','cabor')->get();
        // dd($entry_number);

        return view('pages.entry_name.admin', $data);
    }
    public function contingent()
    {
        // $data['entry_names'] = DB::table('members')
        // ->select('contingents.name as kontingen',DB::raw('count(members.peserta) as peserta'),DB::raw('count(members.cabor_id) as total_cabor'),DB::raw('count(member_match_number.id) as total_nomor'))
        // ->join('cabors', 'cabors.id', '=', 'members.cabor_id')
        // ->join('contingents', 'contingents.id', '=', 'members.contingent_id')
        // ->join('member_match_number', 'member_match_number.member_id', '=', 'members.id')
        // ->groupBy('member_match_number.id', 'members.contingent_id')
        // ->get();
        $data['entry_names'] = Contingent::with([
            'member' => function($query) {
                return $query->with('match_number','cabor')->where('status','kuota');
                
            }, 'nonkuota' => function($query) {
                return $query->where('status','non kuota');
            }, 'atlet' => function($query) {
                return $query->where('peserta', 'atlet');
            }, 'official' => function($query) {
                return $query->where('peserta', 'official');
            }])->where('id','!=',36)->get();
        // dd($data['entry_names']->toArray());

        return view('pages.entry_name.contingent', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entry_numbers = Entry_number::all();
        $members = Member::all();
        $cabors = Cabor::all();
        $contingents = Contingent::where('id','!=',36)->get();

        return view('pages.entry_name.create', compact('entry_numbers', 'members','cabors','contingents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if ($request->peserta == 'Atlet') {
            $rules = array(
                'name' => 'required',
                'nik' => 'required|unique:members',
                'peserta' => 'required',
                'place_of_birth' => 'required',
                'date_of_birth' => 'required',
                'address' => 'required',
                'cabor_id' => 'required',
                'gender' => 'required',
                'npci_daerah' => 'required',
                'file_foto' => 'required|file|mimes:jpg,png,pdf',
                'file_ktp' => 'required|file|mimes:jpg,png,pdf',
                'file_pendukung' => 'required|file|mimes:jpg,png,pdf',
            );
            
        }else{
            $rules = array(
                'name' => 'required',
                'nik' => 'required|unique:members',
                'peserta' => 'required',
                'place_of_birth' => 'required',
                'date_of_birth' => 'required',
                'address' => 'required',
                'cabor_id' => 'required',
                'gender' => 'required',
                'npci_daerah' => 'required',
                'file_foto' => 'required|file|mimes:jpg,png,pdf',
                'file_ktp' => 'required|file|mimes:jpg,png,pdf',
            );

        }
        // dd($rules);
        
        $validator = Validator::make($request->all(), $rules, $messages = [
            'required' => ':attribute harus diisi.',
            'unique' => ':attribute sudah dipakai',
            'file' => 'The :attribute must be a file.',
            'mimes' => 'The :attribute must be a file of type: :values.',
            'min' => 'Format NIK Salah',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with(['notif_status' => '0', 'notif' => 'Insert data failed.'])
                ->withInput();
        }
        $object = array(
            'name' => $request->name,
            'nik' => $request->nik,
            'peserta' => $request->peserta,
            'status' => $request->status,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'cabor_id' => $request->cabor_id,
            'category' => $request->category,
            'gender' => $request->gender,
            'npci_daerah' => $request->npci_daerah,
            'type' => $request->type,
            'wheelchair' => $request->wheelchair,
            'contingent_id' => Auth::user()->contingent->id,
        );
        if ($request->has('file_foto')) {
            $foto = Storage::disk('uploads')->put('file_foto', $request->file_foto);
            $object['file_foto'] = $foto;
        }
        if ($request->has('file_ktp')) {
            $ktp = Storage::disk('uploads')->put('file_ktp', $request->file_ktp);
            $object['file_ktp'] = $ktp;
        }
        if ($request->has('file_pendukung')) {
            $pendukung = Storage::disk('uploads')->put('file_pendukung', $request->file_pendukung);
            $object['file_pendukung'] = $pendukung;
        }
        // dd($request->match_number_id);
        // dd($match_numbers);
        $member_id = Member::create($object)->id;
        $member = Member::findOrFail($member_id);
        if ($member->peserta == "atlet") {
            foreach ($request->match_number_id as $key => $value) {
                # code...
                if ($request->match_number_id[$key] != null) {
                    $match_numbers[$key] = $request->match_number_id[$key];
                }
            }
            $member->match_number()->attach($match_numbers);
        }


        return redirect()->route('entry_names.index')
            ->with('success', 'Entry By Name created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\entry_name  $entry_name
     * @return \Illuminate\Http\Response
     */
    public function show(entry_name $entry_name)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\entry_name  $entry_name
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $edit = Member::with('match_number','cabor')->where('uuid', $uuid)->firstOrFail();
        $cabors = Cabor::all();
        $contingents = Contingent::where('id','!=',36)->get();
        $classifications =  DB::table('classifications')
                            ->select('classifications.*')
                            ->where('classifications.cabor_id',$edit->cabor_id)
                            ->where('classifications.type',$edit->type)
                            ->get();
        $match_numbers = DB::table('member_match_number')
                            ->select('*')
                            ->where('member_match_number.member_id',$edit->id)
                            ->join('match_numbers', 'match_numbers.id', '=', 'member_match_number.match_number_id')
                            ->get();
        $klasifikasi =[];
        foreach ($match_numbers as $key => $value) {
            $klasifikasi[$key]['klasifikasi'] = DB::table('classifications')
                                                ->select('classifications.*')
                                                // ->where('classifications.id',$value->id)
                                                ->where('classifications.cabor_id',$value->cabor_id)
                                                ->where('classifications.type',$value->type)
                                                ->get();
            $klasifikasi[$key]['match_number'] = DB::table('match_numbers')
                                                ->select('*')
                                                ->where('classification_id',$value->classification_id)
                                                ->where('gender',$value->gender)
                                                ->get();
        }
        

        $data['edit'] = $edit;
        $data['cabors'] = $cabors;
        $data['contingents'] = $contingents;
        $data['classification'] = $classifications;
        $data['klasifikasi'] = $klasifikasi;
        $data['match_numbers'] = $match_numbers;
        // dd($klasifikasi);
        return view('pages.entry_name.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\entry_name  $entry_name
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        $detail = Member::where('uuid', $uuid)->firstOrFail();
        
        $rules = array(
            'name' => 'required',
            'nik' => 'required|unique:members,nik,'.$detail->id,
            'peserta' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
            'cabor_id' => 'required',
            'gender' => 'required',
            'npci_daerah' => 'required',
        );
        $validator = Validator::make($request->all(), $rules, $messages = [
            'required' => ':attribute harus diisi.',
            'unique' => ':attribute sudah dipakai',
            'file' => 'The :attribute must be a file.',
            'mimes' => 'The :attribute must be a file of type: :values.',
            'min' => 'Format NIK Salah',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with(['notif_status' => '0', 'notif' => 'Insert data failed.'])
                ->withInput();
        }
        $object = array(
            'name' => $request->name,
            'nik' => $request->nik,
            'peserta' => $request->peserta,
            'status' => $request->status,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'cabor_id' => $request->cabor_id,
            'category' => $request->category,
            'gender' => $request->gender,
            'npci_daerah' => $request->npci_daerah,
            'type' => $request->type,
            'wheelchair' => $request->wheelchair,
            'contingent_id' => Auth::user()->contingent->id,
        );
        $current = Member::findOrFail($detail->id);

        if ($request->has('file_foto')) {
            $file_foto = Storage::disk('uploads')->put('file_foto-category', $request->file_foto);
            $object['file_foto'] = $file_foto;
            // dd($object['avatar']);
            if ($current->file_foto) {
                File::delete('./uploads/' . $current->file_foto);
            }
        }
        if ($request->has('file_ktp')) {
            $file_ktp = Storage::disk('uploads')->put('file_ktp-category', $request->file_ktp);
            $object['file_ktp'] = $file_ktp;
            // dd($object['avatar']);
            if ($current->file_ktp) {
                File::delete('./uploads/' . $current->file_ktp);
            }
        }
        if ($request->has('file_pendukung')) {
            $file_pendukung = Storage::disk('uploads')->put('file_pendukung-category', $request->file_pendukung);
            $object['file_pendukung'] = $file_pendukung;
            // dd($object['avatar']);
            if ($current->file_pendukung) {
                File::delete('./uploads/' . $current->file_pendukung);
            }
        }
        if ($current->peserta == "atlet") {
            # code...
            foreach ($request->match_number_id as $key => $value) {
                # code...
                if ($request->match_number_id[$key] != null) {
                    $match_numbers[$key] = $request->match_number_id[$key];
                }
            }
            $current->match_number()->sync($match_numbers);
        }
        $lastpost = $current->update($object);
        //dd($galery->toArray());
        return redirect()->route('entry_names.index')
            ->with('success', 'Product updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\entry_name  $entry_name
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::FindorFail($id);
        if ($member) {
            $member->delete();
            File::delete('./uploads/' . $member->file_foto);
            File::delete('./uploads/' . $member->file_ktp);
            File::delete('./uploads/' . $member->file_pendukung);
        }

        return redirect()->route('entry_names.index')
            ->with('success', 'Member deleted successfully');
    }

    public function downloadFoto()
    {
        $zip = new ZipArchive();
        $filename = "file_foto.zip";
        
        
        if ($zip->open(public_path($filename), ZipArchive::CREATE) === TRUE) 
        {
            $file = File::files(public_path('./uploads/file_foto/'));

            foreach($file as $key => $value)
            {
                $nameOfFile = basename($value);
                $zip->addFile($value, $nameOfFile);
            }
            $zip->close();
        }
        return response()->download(public_path($filename));
    }

    public function downloadKtp()
    {
        $zip = new ZipArchive();
        $filename = "file_ktp.zip";
        
        if ($zip->open(public_path($filename), ZipArchive::CREATE) === TRUE) 
        {
            $file = File::files(public_path('./uploads/file_ktp/'));

            foreach($file as $key => $value)
            {
                $nameOfFile = basename($value);
                $zip->addFile($value, $nameOfFile);
            }
            $zip->close();
        }
        return response()->download(public_path($filename));
    }

    public function downloadFilePendukung()
    {
        $zip = new ZipArchive();
        $filename = "file_pendukung.zip";
    
        if ($zip->open(public_path($filename), ZipArchive::CREATE) === TRUE) 
        {
            $file = File::files(public_path('./uploads/file_pendukung/'));

            foreach($file as $key => $value)
            {
                $nameOfFile = basename($value);
                $zip->addFile($value, $nameOfFile);
            }
            $zip->close();
        }
        return response()->download(public_path($filename));
    }
}
