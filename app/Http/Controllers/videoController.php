<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\video;
use Gate;
class videoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Gate::allows('isAdmin') ){
            if(!Gate::allows('isEmployee'))
            return redirect()->back()->with('error' , 'not allowed page');
        }
        return view('admin.add_video');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request ,[
            'title' => 'required',
            'discription' => 'required' ,
            'videoFile' => 'required',
            'imageFile' => 'image'
        ]);
        if($request->hasFile('imageFile')){
            $imageNameWithExt = $request->file('imageFile')->getClientOriginalName();
            $imageName = pathinfo($imageNameWithExt , PATHINFO_FILENAME);
            $extensionImage = $request->file('imageFile')->getClientOriginalExtension();
            $imageNameToStore = $imageName . '_' . time() . 2 . '.' . $extensionImage ;
            $Imagepath = $request->file('imageFile')->storeAs('public/videoGallary' , $imageNameToStore);
            
        }
        $video = new video ;
        $video->title = $request->input('title');
        $video->description = $request->input('discription');
        $video->video = $request->input('videoFile');;
        $video->image = $imageNameToStore;
        $video->save();
        return redirect('/add_video')->with('success' , 'تمت اضافه الفيديو');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
