<?php

namespace App\Http\Controllers;

use App\Models\Cabor;
use App\Models\Contingent;
use App\Models\Member;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = cabor::all();
        $members = member::with('cabor', 'contingent')->latest()->simplePaginate(10);

        return view('pages.members.index', compact('item','members'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cabors = cabor::all();
        $contingents = contingent::all();

        return view('pages.members.create', compact('cabors', 'contingents'));
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
            'peserta' => 'required',
            'contingent_id' => 'required',
            'cabor_id' => 'required',
            'gender' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
            'kalurahan' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'status' => 'required',
        
        ]);

        $input = $request->all();
    
        Member::create($input);

        return redirect()->route('members.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(member $member, $id)
    {
        $cabors = cabor::all();
        $contingents = contingent::all();
        $members = member::all();
        $edit = member::where('id', $id)->first();

        return view('pages.members.edit', compact('cabors', 'contingents', 'members', 'member', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, member $member, $id)
    {
        $request->validate([
            'name' => 'required',
            'peserta' => 'required',
            'contingent_id' => 'required',
            'cabor_id' => 'required',
            'gender' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
            'kalurahan' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'status' => 'required',
        ]);

        $input = $request->all();
        $member = member::findorfail($id);

        $member->update($input);
        //dd($galery->toArray());
        return redirect()->route('members.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(member $member)
    {
        $member->DELETE();

        return redirect()->route('members.index')
            ->with('success', 'Product deleted successfully');
    }

    public function generatePdf($uuid, $competition_id)
    {
        // $data = Member::whereHas('competition', function ($query) use ($competition_id) {
        //     $query->where('competition_id', $competition_id);
        // })
        // ->with('contingent', 'cabor', 'competition')
        // ->find($uuid);

        $member = Member::with('contingent', 'cabor', 'competition')->where('uuid', $uuid)->first();
        $competition = DB::table('competitions')->where('id', $competition_id)->first();
        $certificate = DB::table('member_competitions')
            ->where('member_id', $uuid)
            ->where('competition_id', $competition_id)
            ->first();

        // dd($data);

        // $data = DB::table('members')
        // ->join('contingents', 'members.contingent_id', '=', 'contingents.id')
        // ->join('cabors', 'members.cabor_id', '=', 'cabors.id')
        // ->join('member_competitions', 'members.id', '=', 'member_competitions.member_id')
        // ->select('members.name as member_name', 'contingents.name as contingent_name', 'cabors.name as cabor_name', 'member_competitions.medal')
        // ->where('members.id', $uuid)
        // ->get();

        // $data = DB::table('members')
        // ->select(
        //     'members.name as member_name',
        //     'contingents.name as contingent_name',
        //     'cabors.name as cabor_name',
        //     'member_competitions.medal'
        // )
        // ->join('contingents', 'members.contingent_id', '=', 'contingents.id')
        // ->join('cabors', 'members.cabor_id', '=', 'cabors.id')
        // ->join('member_competitions', 'members.id', '=', 'member_competitions.member_id')
        // ->where('members.id', $uuid)
        // ->get();

        // $data = Member::with(['contingent', 'competition' => function ($query) {
        //     $query->withPivot('medal');
        // }, 'cabor'])
        // ->find($uuid);

    // $data = DB::table('members')
    // ->select(
    //     'members.name as member_name',
    //     'contingents.name as contingent_name',
    //     'cabors.name as cabor_name',
    //     'member_competitions.medal'
    // )
    // ->join('member_competitions', 'members.id', '=', 'member_competitions.member_id')
    // ->join('contingents', 'members.contingent_id', '=', 'contingents.id')
    // ->join('cabors', 'members.cabor_id', '=', 'cabors.id')
    // ->where('members.id', $uuid)
    // ->orderBy('members.name')
    // ->get();

        $pdf = PDF::setPaper('a4', 'landscape')->loadview('pages.sertifikat.index', compact('member', 'competition', 'certificate'));
    
        return $pdf->stream();
    }

    public function viewpdf() 
    {

        return view('pages.sertifikat.index');
    }
}
