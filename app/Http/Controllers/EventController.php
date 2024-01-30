<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('event.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
    }

    public function data()
    {
        $event = Event::orderBy('id_event', 'ASC')
            ->get();

        return datatables()
            ->of($event)
            ->addIndexColumn()
            ->addColumn('aksi', function ($event) {
                return '
            <div class="btn-group">
                
                <button onclick="editForm(`' . route('event.update', $event->id_event) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                <button onclick="deleteData(`' . route('event.destroy', $event->id_event) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
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

        $event = new Event();
        $event->nama_event = $request->nama_event;
        $event->harga_paket = $request->harga_paket;
        $event->desc = $request->desc;
        $event->status = $request->status;
        if ($request->hasFile('path_foto')) {
            $file = $request->file('path_foto');
            $nama = 'FOTO-' . $event->nama_event . date('Y-m-d-His') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/event-img'), $nama);

            $event->foto = "/event-img/$nama";
        }

        // return json_decode($request);
        $event->save();

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
        $event = Event::find($id);

        return response()->json($event);
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
        $event = Event::find($id);
        $event->nama_event = $request->nama_event;
        $event->harga_paket = $request->harga_paket;
        $event->desc = $request->desc;
        $event->status = $request->status;
        if ($request->hasFile('path_foto')) {
            $file = $request->file('path_foto');
            $nama = 'FOTO-EVENT' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/event-img'), $nama);

            $event->foto = "/event-img/$nama";
        }

        $event->update();

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
        $event = Event::find($id);
        // Dapatkan path file
        $file = $event->foto;
        // Periksa apakah file ada
        if (file_exists($file)) {
            // Hapus file
            unlink($file);
        }

        $event->delete();

        return response(null, 204);
    }
}