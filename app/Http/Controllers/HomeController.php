<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Staff;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $about = About::all()->where('status', 'tampil');

        $kategori = 'spesial';
        $special = Menu::whereHas('kategori', function ($query) use ($kategori) {
            $query->where('nama_kategori', $kategori);
        })->get();

        $kategori = Kategori::all()->where('status', 'tampil');

        $menu = Menu::with('kategori')->where('status', 'tampil')->get();

        $event = Event::all()->where('status', 'tampil');

        $testimoni = Testimoni::all()->where('status', 'tampil');

        $gallery = Gallery::all()->where('status', 'tampil');

        $staff = Staff::with('jabatan')->where('status', 'tampil')->get();
        return view('index.index', compact('about', 'kategori', 'menu', 'special', 'event', 'testimoni', 'gallery', 'staff'));
    }
}
