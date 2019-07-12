<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\siswa;
class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
       
        $siswa = siswa::all();
        $response = [
            'success' => true,
            'data' => $siswa,
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siswa = new siswa;
        $siswa->nama = $request->nama;
        $siswa->umur = $request->umur;
        $siswa->cita_cita = $request->cita_cita;
        $siswa->hobby = $request->hobby;
        $siswa->guru = $request->guru;
        $siswa->save();
        $response = [
            'success' => true,
            'data' => $siswa,
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
        $siswa = siswa::findOrFail($id);
        $response = [
            'success' => true,
            'data' => $siswa,
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
        //
    }

    /*s
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $siswa = siswa::findOrFail($id) ;
        $siswa->nama = $request->nama;
        $siswa->umur = $request->umur;
        $siswa->cita_cita = $request->cita_cita;
        $siswa->hobby = $request->hobby;
        $siswa->guru = $request->guru;
        $siswa->save();
        $response = [
            'success' => true,
            'data' => $siswa,
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
        $siswa = siswa::findOrFail($id)->delete();
        $response = [
            'success' => true,
            'data' => $siswa,
            'massage' => 'berhasil'
        ];
        return response()->json($response, 200);
    }
}
