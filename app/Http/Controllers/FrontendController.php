<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Artikel;
use App\Tag;
use App\Kategori;
use Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $artikel = Artikel::with('kategori','tag','user')->get();
        return view('frontend.index', compact('artikel'));
        // $artikel = Artikel::all();
        // $kategori = Kategori::all();
        // $tag = Tag::all();
        // return view('frontend.index', compact ('artikel'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function galeri()
    {
        return view('frontend.galeri');
    }


    public function review()
    {
        return view('frontend.review');
    }

    public function kategori()
    {
        return view('frontend.kategori');
    }

    public function blog()
    {
        $artikel = Artikel::orderBy('created_at', 'desc')->paginate(3);
        $kategori = Kategori::all();
        $tag = Tag::all();
        return view('frontend.blog', compact('artikel','kategori','tag'));
    }

    public function singleblog(Artikel $artikel)
    {
        $artikel = Artikel::orderBy('created_at', 'desc')->paginate(3);
        $kategori = Kategori::all();
        $tag = Tag::all();
        return view('frontend.single-blog', compact('artikel','kategori','tag'));
    }

    public function blogtag(Tag $tag)
    {
        $artikel = $tag->Artikel()->latest()->paginate(5);
        $kategori = Kategori::all();
        $tag = Tag::all();
        return view('frontend.blog', compact('artikel','kategori','tag'));
    }

    public function blogkategori(Kategori $kategori)
    {
        $artikel = $kategori->Artikel()->latest()->paginate(5);
        $kategori = Kategori::all();
        $tag = Tag::all();
        return view('frontend.blog', compact('artikel','kategori','tag'));
    }
}
