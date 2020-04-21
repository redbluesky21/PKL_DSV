<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tandatangan;

class TandaTanganController extends Controller
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
        $tandatangans = TandaTangan::all()->toArray();
        return view('tandatangan.index', compact('tandatangans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tandatangan.create');
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
            'nama_lengkap'  =>  ['required', 'string', 'max:255'],
            'NIP'           =>  ['required', 'string','unique:tanda_tangans'],
            'jabatan'       =>  ['required', 'string', 'max:255'],
            'tempat_menjabat' =>  ['required', 'string', 'max:255'],
            'keterangan' =>  ['string', 'max:255'],
        ]);
        $tandatangan = new TandaTangan([
            'nama_lengkap'  =>  $request->get('nama_lengkap'),
            'NIP'           =>  $request->get('NIP'),
            'jabatan'       =>  $request->get('jabatan'),
            'tempat_menjabat' =>  $request->get('tempat_menjabat'),
            'keterangan' =>  $request->get('keterangan'),
        ]);
        $tandatangan->save();
        return redirect()->route('tandatangan.index')->with('success', 'Data Added');
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
        $tandatangan = TandaTangan::find($id);
        return view('tandatangan.edit', compact('tandatangan', 'id'));
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
            'nama_lengkap'  =>  ['required', 'string', 'max:255'],
            'NIP'           =>  ['required', 'string'],
            'jabatan'       =>  ['required', 'string', 'max:255'],
            'tempat_menjabat' =>  ['required', 'string', 'max:255'],
            'keterangan' =>  ['string', 'max:255'],
        ]);

        $tandatangan = TandaTangan::find($id);
        $tandatangan->nama_lengkap = $request->get('nama_lengkap');
        $tandatangan->NIP = $request->get('NIP');
        $tandatangan->jabatan = $request->get('jabatan');
        $tandatangan->tempat_menjabat = $request->get('tempat_menjabat');
        $tandatangan->keterangan = $request->get('keterangan');
        $tandatangan->update();
        return redirect()->route('tandatangan.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tandatangan = TandaTangan::find($id);
        $tandatangan->delete();
        return redirect()->route('tandatangan.index')->with('success', 'Data Deleted');
    }
}
