<?php

namespace App\Http\Controllers;

use App\Models\Tempat;
use Auth;
use Illuminate\Http\Request;

class TempatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Tempat::paginate(5);
        return view('pages.admin.tempat.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.tempat.create');
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
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required'],
            'nt' => ['required', 'numeric']
        ]);
        $nama = $request->nama;
        $alamat = $request->alamat;
        $nt = $request->nt;

        // dd($request);
        Tempat::create([
            'nama' => $nama,
            'alamat' => $alamat,
            'nt' => $nt

        ]);

        return redirect()->route('tempat.index')->with('success', 'Tambah data sukses.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Tempat::findOrFail($id);
        return view('pages.admin.tempat.edit', compact('item'));
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
        $tempat = Tempat::findOrFail($id);
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required'],
            'nt' => ['required', 'numeric']
        ]);
        $tempat->nama = $request->nama;
        $tempat->alamat = $request->alamat;
        $tempat->nt = $request->nt;

        if($tempat->save()){
            return redirect()->route('tempat.index')
            ->with('success', 'edit data successfully.');
        }else{
            return redirect()->route('tempat.index')
            ->with('danger', 'gagal edit data.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Tempat::findOrFail($id);
        $item->delete();
        return redirect()->route('tempat.index')
                        ->with('success','berhasil menghapus tempat.');
    }

}
