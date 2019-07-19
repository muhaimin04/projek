<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use Session;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = Tag::orderBy('created_at','desc')->get();
        $response = [
            'success' => true,
            'data' => $tag,
            'massage' => 'berhasil'
        ];
        return response()->json($response,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('backend.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_tag' => 'required|unique:tags'
        ]);
        $tag = new Tag();
        $tag->nama_tag = $request->nama_tag;
        $tag->slug = str_slug($request->nama_tag, '-');
        $tag->save();
        $response = [
            'success' => true,
            'data' => $tag->nama_tag,
            'massage' => 'berhasil'
        ];
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        $response = [
            'success' => true,
            'data' => $tag,
            'massage' => 'Berhasil'
        ];
        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrfail($id);
        return view('backend.tag.edit',compact('tag'));
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
        $request->validate([
            'nama_tag' => 'required'
        ]);
        $tag = Tag::findOrfail($id);
        $tag->nama_tag = $request->nama_tag;
        $tag->slug = str_slug($request->nama_tag, '-');
        $tag->save();
        $response = [
            'success' => true,
            'data' => $tag->nama_tag,
            'massage' => 'berhasil'
        ];
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrfail($id)->delete();
        $response = [
            'success' => true,
            'data' => $tag,
            'massage' => 'berhasil menghapus'
        ];
        return response()->json($response, 200);
    }
}
