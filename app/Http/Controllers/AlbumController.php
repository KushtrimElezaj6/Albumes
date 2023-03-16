<?php

namespace App\Http\Controllers;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums= Album::orderBy('id', 'DESC')->get();
        return view('albums.index')->with('albums', $albums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
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
        'title'=> 'required|max:250'

       ]);

       if(Album::create($request->only('title')))
        return redirect()->route('albums.index')->with('succes', 'albumi u krijua me sukses');

        else
               return redirect()->back()->with('error', 'albumi nuk eshte kreijuar');
        

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album=Album::find($id);
        $images = $album->images;
        
        return view('albums.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::find($id);
        return view('albums.edit')->with('albums', $album);
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
            'title'=> 'required|max:250'
    
           ]);
           $albums = Album::find($id);
    
           if($albums->update( $request->only('title')))
            return redirect()->route('albums.index')->with('succes', 'albumi u krijua me sukses');
    
            else
                   return redirect()->back()->with('error', 'albumi nuk eshte kreijuar');
            
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album= Album::find($id);
          
        if($album->delete())
        return redirect()->route('albums.index')->with('succes', 'albumi u fshi me sukses');
    
        else
               return redirect()->back()->with('error', 'albumi nuk eshte fshi');
        
    }
}
