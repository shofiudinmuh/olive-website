<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = Jabatan::all()->pluck('nama_jabatan', 'id_jabatan');
        return view('staff.index', compact('jabatan'));
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
        $staff = Staff::leftJoin('jabatan', 'jabatan.id_jabatan', 'staff.id_jabatan')
            ->orderBy('id_staff', 'ASC')
            ->get();

        return datatables()
            ->of($staff)
            ->addIndexColumn()
            ->addColumn('aksi', function ($staff) {
                return '
            <div class="btn-group">
                
                <button onclick="editForm(`' . route('staff.update', $staff->id_staff) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                <button onclick="deleteData(`' . route('staff.destroy', $staff->id_staff) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
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
        $staff = new Staff();

        $staff->nama_staff = $request->nama_staff;
        $staff->id_jabatan = $request->id_jabatan;
        $staff->status = $request->status;
        if ($request->hasFile('path_foto')) {
            $file = $request->file('path_foto');
            $nama = 'FOTO-' . $staff->nama_staff . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/staff-img'), $nama);

            $staff->foto = "/staff-img/$nama";
        }

        $staff->save();

        return response()->json('Data berhasil disimpan!', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = Staff::find($id);

        return response()->json($staff);
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
        $staff = Staff::with('jabatan')->find($id);

        $staff->nama_staff = $request->nama_staff;
        $staff->id_jabatan = $request->id_jabatan;
        $staff->status = $request->status;
        if ($request->hasFile('path_foto')) {
            $file = $request->file('path_foto');
            $nama = 'FOTO-' . $staff->nama_staff . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/staff-img'), $nama);

            $staff->foto = "/staff-img/$nama";
        }

        $staff->update();

        return response()->json('Data berhasil disimpan!', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Staff::find($id);
        $file = $staff->foto;

        if (file_exists($file)) {
            unlink($file);
        }

        $staff->delete();

        return response()->json('Data berhasil dihapus!', 205);
    }
}