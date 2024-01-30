<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function data()
    {
        $gallery = Gallery::orderBy('id_gallery', 'ASC')
            ->get();

        return datatables()
            ->of($gallery)
            ->addIndexColumn()
            ->addColumn('aksi', function ($gallery) {
                return '
            <div class="btn-group">
                
                <button onclick="editForm(`' . route('gallery.update', $gallery->id_gallery) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                <button onclick="deleteData(`' . route('gallery.destroy', $gallery->id_gallery) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
            ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gallery = new Gallery();
        $gallery->nama_gallery = $request->nama_gallery;
        $gallery->status = $request->status;
        if ($request->hasFile('path_foto')) {
            $file = $request->file('path_foto');
            $nama = 'FOTO-' . $gallery->nama_gallery . date('Y-m-d-His') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/event-img'), $nama);

            $gallery->foto = "/event-img/$nama";
        }

        // return json_decode($request);
        $gallery->save();

        return response()->json('Event berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery = Gallery::find($id);

        return response()->json($gallery);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $gallery = Gallery::find($id);
        $gallery->nama_gallery = $request->nama_gallery;
        $gallery->status = $request->status;
        if ($request->hasFile('path_foto')) {
            $file = $request->file('path_foto');
            $nama = 'FOTO-' . $gallery->nama_gallery . date('Y-m-d-His') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/gallery'), $nama);

            $gallery->foto = "/gallery/$nama";
        }

        // return json_decode($request);
        $gallery->update();

        return response()->json('Event berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);

        $file = $gallery->foto;
        // Periksa apakah file ada
        if (file_exists($file)) {
            // Hapus file
            unlink($file);
        }

        $gallery->delete();

        return response()->json('Data berhasil dihapus!');
    }
}