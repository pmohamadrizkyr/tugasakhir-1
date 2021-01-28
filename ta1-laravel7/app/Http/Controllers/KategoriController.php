<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Http\Controllers\Policies\KategoriPolicy;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategori::all();
        return view('main.admin.kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('main.admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //batasi hak akses untuk proses store
        $this->authorize('create', Kategori::class);
        $validatedData = $request->validate([
            'nama_kategori' => 'required|min:3|max:50',
            'nama_supervisor' => 'required',
            'jumlah_kategori' => 'required|min:1|integer'
        ]);
        //math assignment
        Kategori::create($validatedData);
        // $request->session()->flash('pesan', "Kategori {$validatedData['nama_kategori']} Berhasil Ditambahkan");
        // return redirect()->route('kategoris.index');
        return redirect()->route('kategoris.index')->with('pesan', "Produk $request->nama_kategori Berhasil Disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        return view('main.admin.kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view('main.admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required',
            'nama_supervisor' => 'required',
            'jumlah_kategori' => 'required|min:1|integer'
        ]);
        //math assignment
        $request->$kategori;
        $kategori->update($validatedData);
        //tidak memakai route name
        return redirect()->route('kategoris.index', ['produk'=>$produk->id])->with('pesan', "Kategori $request->nama_kategori Berhasil Di Ubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        //batasi hak akses untuk proses store
        $this->authorize('delete', $kategori);

        $kategori->delete();
        return redirect()->route('kategoris.index')->with('pesan', "Kategori $kategori->nama_kategori Berhasil Di Hapus");
    }
}
