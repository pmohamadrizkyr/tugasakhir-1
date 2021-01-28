<?php

namespace App\Http\Controllers;

use App\Produk;
use App\Kategori;
use App\Dekripsi;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = Produk::all();
        $kategoris = Kategori::all();
        return view('main.admin.produk.index', compact('produks', 'kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $kategoris = Kategori::all();
         return view('main.admin.produk.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code'=>'required|size:5|unique:produks',
            'name_produk' => 'required|min:3|max:50',
            'image' => 'required|file|image|max:7000',
            'stock' => 'required|in:tersedia,kosong',
            'price' => 'required|min:4|max:20',
            'category_id' => 'required'
        ]);
        $validatedData['image'] = $request->file('image')->store('assets/gallery', 'public');
        //intansiasi
        $produk = Produk::create($validatedData);
        //nama filenya
        $dekripsi = new Dekripsi;
        $dekripsi->deks_ripsi = $request->input('deks_ripsi');
        //order()->nama function
        $produk->dekripsi()->save($dekripsi);
        $request->session()->flash('pesan', "Produk {$validatedData['name_produk']} Berhasil Ditambahkan");
        return redirect()->route('produks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        return view('main.admin.produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        $kategoris = Kategori::all();
        return view('main.admin.produk.edit', compact('produk', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $validatedData = $request->validate([
            'code'=>'required|size:5|unique:produks,code,'.$produk->id,
            'name_produk' => 'required|min:3|max:50',
            'image' => 'image|image|max:7000',
            'stock' => 'required|in:tersedia,kosong',
            'price' => 'required|min:4|max:20',
            'category_id' => 'required'
        ]);
        if($request->image){
            Storage::delete('public/'.$validateId->image);
            $validatedData['image'] = $request->file('image')->store('assets/img', 'public');
        }
        // dd($validatedData);
        // $request->$produk;
        $produk->update($validatedData);
        $dekripsi = $produk->dekripsi;
        $dekripsi->deks_ripsi = $request->input('deks_ripsi');
        $produk->dekripsi()->save($dekripsi);
        return redirect()->route('produks.show', ['produk' => $produk->id])->with('pesan', "Update Produk Data {$validatedData['name_produk']} Berhasil Diubah");
        // Produk::update($validatedData);
        // return redirect('/produks/'.$produk->id)->with('pesan', "Produk $request->name_produk Berhasil Diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produks.index')->with('hapus', "Hapus Data $produk->name_product Berhasil");
    }
}
