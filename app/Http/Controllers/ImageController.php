<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Album;
use Illuminate\Http\Request;

class ImageController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $album = Album::find($id);
        return view('iamges.create')->with('album', $album);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:250',
            'image' => 'required',
        ]);

        $filename = time() . "." . $request->image->extension();

        $data['title'] = $request->title;
        $data['image'] = $filename;

        if (Image::create($data)) {
            $request->image->move(public_path('uploads', $filename));
            return redirect()->back()->with('succes', 'imazhi eshte krijuar');
        } else
            return redirect()->back()->with('error', 'imazhi nuk eshte krijuar');
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
        $image = Image::find($id);
        return view('image.edit')->with('Image', $image);
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
            'title' => 'required|max:250',
            'image' => 'required'

        ]);

        $filename = time() . $request->image->extension();

        $data['title'] = $request->title;
        $data['image'] = $filename;
        $image = Image::find($id);

        if ($image->update($data)) {
            return redirect()->back()->with('succes', 'imazhi eshte krijuar');
        } else
            return redirect()->back()->with('error', 'imazhi nuk eshte krijuar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);

        if ($image->delete()) {
          unlink(public_path('uploads').$image->image);
            return redirect()->route('images.index')->with('sucess', 'imazhi u fshi me sukses');
        } else
            return redirect()->back()->with('error', 'Imazhi nuk eshte fshir');
    }
}
