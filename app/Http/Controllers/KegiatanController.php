<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Auth;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'Admin') {
            $items = Kegiatan::orderBy('id', 'DESC')->paginate(5);
        }else{
            $items = Kegiatan::where('tempat_pkl_id', Auth::user()->profile->tempat_pkl_id)->orderBy('id', 'DESC')->paginate(5);
        }
        return view('pages.admin.kegiatan.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.kegiatan.create');
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
            'image' => ['mimes:jpeg,png,jpg,webp'],
            'description' => ['required']
        ]);
        $user_id = $request->user_id;
        $tempat_pkl_id = $request->tempat_pkl_id;
        $title = $request->title;
        $description = $request->description;
        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $image = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./image', $image);
        }
        // dd($request);
        Kegiatan::create([
            'user_id' => $user_id,
            'tempat_pkl_id' => $tempat_pkl_id,
            'title' => $title,
            'description' => $description,
            'image' => $image

        ]);

        return redirect()->route('kegiatan.index')->with('success', 'Tambah data sukses.');
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
        $item = Kegiatan::findOrFail($id);
        return view('pages.admin.kegiatan.edit', compact('item'));
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
        $kegiatan = Kegiatan::findOrFail($id);
        $request->validate([
            'user_id' => ['required'],
            'tempat_pkl_id' => ['required'],
            'title' => ['required', 'string', 'max:255'],
            'image' => ['mimes:jpeg,png,jpg,webp'],
            'description' => ['required']
        ]);
        $kegiatan->user_id = $request->user_id;
        $kegiatan->tempat_pkl_id = $request->tempat_pkl_id;
        $kegiatan->title = $request->title;
        $kegiatan->description = $request->description;
        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $image = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./image', $image);
            $kegiatan['image'] = "$image";
        }

        if($kegiatan->save()){
            return redirect()->route('kegiatan.index')
            ->with('success', 'edit data successfully.');
        }else{
            return redirect()->route('kegiatan.index')
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
        $item = Kegiatan::findOrFail($id);
        $item->delete();
        return redirect()->route('kegiatan.index')
                        ->with('success','berhasil menghapus kegiatan.');
    }

}
