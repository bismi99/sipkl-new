<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Auth;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'Admin') {
            $items = Laporan::orderBy('id', 'DESC')->paginate(5);
        }else{
            $items = Laporan::where('tempat_pkl_id', Auth::user()->profile->tempat_pkl_id)->orderBy('id', 'DESC')->paginate(5);
        }
        return view('pages.admin.laporan.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.laporan.create');
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
            'user_id' => ['required'],
            'tempat_pkl_id' => ['required'],
            'title' => ['required', 'string', 'max:255'],
            'file' => ['mimes:doc,docx,ppt,pptx,pdf'],
            'description' => ['required'],
        ]);
        $user_id = $request->user_id;
        $tempat_pkl_id = $request->tempat_pkl_id;
        $title = $request->title;
        $description = $request->description;
        if (request()->hasFile('file')) {
            $file = request()->file('file');
            $files = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./file', $files);
        }
        // dd($request);
        Laporan::create([
            'user_id' => $user_id,
            'tempat_pkl_id' => $tempat_pkl_id,
            'title' => $title,
            'description' => $description,
            'file' => $files

        ]);

        return redirect()->route('laporan.index')->with('success', 'Tambah data sukses.');
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
        $item = Laporan::findOrFail($id);
        return view('pages.admin.laporan.edit', compact('item'));
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
        $laporan = Laporan::findOrFail($id);
        $request->validate([
            'user_id' => ['required'],
            'tempat_pkl_id' => ['required'],
            'title' => ['required', 'string', 'max:255'],
            'file' => ['mimes:doc,docx,ppt,pptx,pdf'],
            'description' => ['required'],
        ]);
        $laporan->user_id = $request->user_id;
        $laporan->tempat_pkl_id = $request->tempat_pkl_id;
        $laporan->title = $request->title;
        $laporan->description = $request->description;
        if (request()->hasFile('file')) {
            $file = request()->file('file');
            $files = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./file', $files);
            $laporan['file'] = "$files";
        }

        if($laporan->save()){
            return redirect()->route('laporan.index')
            ->with('success', 'edit data successfully.');
        }else{
            return redirect()->route('laporan.index')
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
        $item = Laporan::findOrFail($id);
        $item->delete();
        return redirect()->route('laporan.index')
                        ->with('success','berhasil menghapus laporan.');
    }

}
