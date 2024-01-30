<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Biodata;
use App\Models\Kategori;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Menu;
use App\Models\RiwayatJabatan;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all()->pluck('nama_kategori', 'id_kategori');

        return view('menu.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $menu = Menu::leftJoin('kategori', 'kategori.id_kategori', 'menu.id_kategori');
        // ->get();

        return datatables()
            ->of($menu)
            ->addIndexColumn()
            ->addColumn('aksi', function ($menu) {
                return '
            <div class="btn-group">
                
                <button onclick="editForm(`' . route('menu.update', $menu->id_menu) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                <button onclick="deleteData(`' . route('menu.destroy', $menu->id_menu) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
            ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        // $kategori = Kategori::all()->pluck('nama_kategori', 'id_kategori');

        // return view('menu.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menu();
        $menu->nama_menu = $request->nama_menu;
        $menu->harga = $request->harga;
        $menu->product_knowladge = $request->product_knowladge;
        $menu->desc = $request->desc;
        $menu->id_kategori = $request->id_kategori;
        $menu->status = $request->status;
        if ($request->hasFile('path_foto')) {
            $file = $request->file('path_foto');
            $nama = 'FOTO-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img'), $nama);

            $menu->foto_menu = "/img/$nama";
        }

        $menu->save();

        return response()->json('Data berhasil disimpan', 200);
        // return redirect()->route('menu.index')->with('toast_success', 'Data Menu Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::with('kategori')->findOrFail($id);

        // return view('menu.show', compact('menu'));
        return response()->json($menu);
    }

    //controller riwayat jabatan
    // public function riwayat($id)
    // {
    //     $riwayat_jabatan = RiwayatJabatan::with('sk', 'biodata', 'kecamatan', 'desa', 'jabatan')->where('id_biodata', $id);
    //     return view('biodata.jabatan', compact('riwayat_jabatan'));
    // }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::with('kategori')->findOrFail($id);
        $kategori = Kategori::all()->pluck('nama_kategori', 'id_kategori');
        return view('menu.update', compact('kategori', 'menu'));
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
        $menu = Menu::findOrFail($id);
        $menu->nama_menu = $request->nama_menu;
        $menu->harga = $request->harga;
        $menu->product_knowladge = $request->product_knowladge;
        $menu->desc = $request->desc;
        $menu->id_kategori = $request->id_kategori;
        $menu->status = $request->status;
        if ($request->hasFile('path_foto')) {
            $file = $request->file('path_foto');
            $nama = 'FOTO-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img'), $nama);

            $menu->foto_menu = "/img/$nama";
        }

        $menu->update();

        return response()->json('Data berhasil disimpan', 200);
        // return redirect()->route('menu.index')->with('toast_success', 'Data Menu Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $file = $menu->foto_menu;
        // Periksa apakah file ada
        if (file_exists($file)) {
            // Hapus file
            unlink($file);
        }
        $menu->delete();

        return response()->json('Data berhasil dihapus', 200);
    }
}