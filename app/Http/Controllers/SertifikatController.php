<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sertifikat;

class SertifikatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sertifikats = Sertifikat::all()->toArray();
        return view('sertifikat.index', compact('sertifikats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sertifikat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_sertifikat'  =>  ['required', 'string', 'max:255'],
            'tandatangan1'       =>  ['required', 'string', 'max:255'],
            'tandatangan2'       =>  ['required', 'string', 'max:255'],
            'tandatangan3'       =>  ['required', 'string', 'max:255'],
        ]);
        $sertifikat = new Sertifikat([
            'nama_sertifikat'  =>  $request->get('nama_sertifikat'),
            'tandatangan1'       =>  $request->get('tandatangan1'),
            'tandatangan2'       =>  $request->get('tandatangan2'),
            'tandatangan3'       =>  $request->get('tandatangan3'),
        ]);
        $sertifikat->save();
        return redirect()->route('sertifikat.index')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sertifikat = Sertifikat::find($id);
        return view('sertifikat.edit', compact('sertifikat', 'id'));
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
        $this->validate($request, [
            'nama_sertifikat'  =>  ['required', 'string', 'max:255'],
            'tandatangan1'       =>  ['required', 'string', 'max:255'],
            'tandatangan2'       =>  ['required', 'string', 'max:255'],
            'tandatangan3'       =>  ['required', 'string', 'max:255'],
        ]);

        $sertifikat = Sertifikat::find($id);
        $sertifikat->nama_sertifikat = $request->get('nama_sertifikat');
        $sertifikat->tandatangan1 = $request->get('tandatangan1');
        $sertifikat->tandatangan2 = $request->get('tandatangan2');
        $sertifikat->tandatangan3 = $request->get('tandatangan3');
        $sertifikat->update();
        return redirect()->route('sertifikat.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sertifikat = Sertifikat::find($id);
        $sertifikat->delete();
        return redirect()->route('sertifikat.index')->with('success', 'Data Deleted');
    }
}
