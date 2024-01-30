<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('about.index');
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
        $about = About::orderBy('id_about', 'desc')->get();

        return datatables()
            ->of($about)
            ->addIndexColumn()
            ->addColumn('aksi', function ($about) {
                return '
                <div class="btn-group">
                    <button onclick="editForm(`' . route('about.update', $about->id_about) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button onclick="deleteData(`' . route('about.destroy', $about->id_about) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
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
        $about = new About();
        $about->judul = $request->judul;
        $about->desc = $request->desc;
        $about->list1 = $request->list1;
        $about->list2 = $request->list2;
        $about->list3 = $request->list3;
        $about->status = $request->status;
        if ($request->hasFile('path_foto')) {
            $file = $request->file('path_foto');
            $nama = 'FOTO-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/about-img'), $nama);

            $about->foto = "/about-img/$nama";
        }

        $about->save();

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
        $about = About::findOrFail($id);

        return response()->json($about);
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
        $about = About::find($id);
        $about->judul = $request->judul;
        $about->desc = $request->desc;
        $about->list1 = $request->list1;
        $about->list2 = $request->list2;
        $about->list3 = $request->list3;
        $about->status = $request->status;
        if ($request->hasFile('path_foto')) {
            $file = $request->file('path_foto');
            $nama = 'FOTO-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/about-img'), $nama);

            $about->foto = "/about-img/$nama";
        }

        $about->update();

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
        $about = About::find($id);
        $file = $about->foto;
        // Periksa apakah file ada
        if (file_exists($file)) {
            // Hapus file
            unlink($file);
        }
        $about->delete();

        return response()->json('Data berhasil dihapus', 200);
    }
}
