<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Films;
class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data['films']=Films::all();
      return view('films.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('films.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=[

            'judul' =>$request->judul,
            'author' =>$request->author,
            'studio' =>$request->studio,
            'rating' =>$request->rating
            
        ];

        Films::create($data);

        return redirect()->route('films.index')->with('berhasil','Data Film berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data['films'] = Films::find($id);
       return view('films.edit', $data);
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
        $films= Films::findOrfail($id);
        $data=[

            'judul' =>$request->judul,
            'author' =>$request->author,
            'studio' =>$request->studio,
            'rating' =>$request->rating
            
        ];

        $films->update($data);

        return redirect()->route('films.index')->with('berhasil','Data Film berhasil di ubah!');
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $films = Films::find($id);
        $films->delete();
        return redirect()->route('films.index')->with('berhasil', 'Data berhasil di hapus!');
    }
}
