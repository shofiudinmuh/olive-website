<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('testimoni.index');
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
        $testimoni = Testimoni::orderBy('id_testimoni', 'ASC')
            ->get();

        return datatables()
            ->of($testimoni)
            ->addIndexColumn()
            ->addColumn('aksi', function ($testimoni) {
                return '
            <div class="btn-group">
                
                <button onclick="editForm(`' . route('testimoni.update', $testimoni->id_testimoni) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                <button onclick="deleteData(`' . route('testimoni.destroy', $testimoni->id_testimoni) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
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
        $testimoni = new Testimoni();
        $testimoni->nama_tester = $request->nama_tester;
        $testimoni->pekerjaan = $request->pekerjaan;
        $testimoni->review = $request->review;
        $testimoni->status = $request->status;
        if ($request->hasFile('path_foto')) {
            $file = $request->file('path_foto');
            $nama = 'FOTO-' . $testimoni->nama_tester . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/testimoni-img'), $nama);

            $testimoni->foto = "/testimoni-img/$nama";
        }

        $testimoni->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testimoni = Testimoni::find($id);

        return response()->json($testimoni);
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
        $testimoni = Testimoni::find($id);
        $testimoni->nama_tester = $request->nama_tester;
        $testimoni->pekerjaan = $request->pekerjaan;
        $testimoni->review = $request->review;
        $testimoni->status = $request->status;
        if ($request->hasFile('path_foto')) {
            $file = $request->file('path_foto');
            $nama = 'FOTO-' . $testimoni->nama_tester . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/testimoni-img'), $nama);

            $testimoni->foto = "/testimoni-img/$nama";
        }

        $testimoni->update();

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimoni = Testimoni::find($id);

        $file = $testimoni->foto;
        // Periksa apakah file ada
        if (file_exists($file)) {
            // Hapus file
            unlink($file);
        }
        $testimoni->delete();

        return response()->json('Data berhasil dihapus', 200);
    }
}