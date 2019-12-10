<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Storage;
use App\Uploads;
use App\User;
use DB;

class filesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $sub_id = $id;
        return view('teacher.add_assignment')->with('sub_id',$sub_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $validatedData = $this->validate($request,[
                'Title'=>'bail|required',
                'file' => 'bail|mimes:pdf|max:10000'
            ]);
            if($request->hasFile('title')){
                //Get filename with the extension
                $fileNameWithExt = $request->file('title')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                //get just extintion
                $extension = $request->file('title')->getClientOriginalExtension();
                //filename to store
                $fileNameToStore=$filename . '_'.time() . '.' . $extension;
                //upload image
                $path=$request->file('title')->storeAs('public/homework',$fileNameToStore);
            
            $file = new Uploads ;
            $file->title = $fileNameToStore;
            $file->subject_id = $request->input('sub_id');
            $file->save();
            
            return redirect()->back()->with('success','Post Created');       
        }else{
            echo "failed to upload"; };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assignment = Uploads::find($id);
        return view('teacher.edit_assignment')->with('assignment',$assignment);
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
        $this->validate($request,[
            'title'=>'required'
        ]);
        $file= Uploads::find($id);
 
        if($request->hasFile('pdf')){
            //delete the old file from our storage
            Storage::delete('/public/homework/'.$file->title);
            //create a new file name
            //Get filename with the extension
            $fileNameWithExt = $request->file('pdf')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just extintion
            $extension = $request->file('pdf')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore=$filename . '_'.time() . '.' . $extension;
            //upload image
            $path=$request->file('pdf')->storeAs('public/homework',$fileNameToStore);
            $file->title=$fileNameToStore;
            $file->save();
            return redirect()->back()->with('success','file updated');
        }
        return redirect()->back()->with('success','file updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Uploads::find($id);
        Storage::delete('/public/homework/'.$delete->title);
        $delete->delete();
        return redirect()->back()->with('success','Post deleted');
    }

    public function download($id){
        $downloads = Uploads::where('subject_id' ,$id)->get();
        return view('user.homework',compact('downloads'));

        }

    public function list($id){

        $files=Uploads::where('subject_id' , $id)->get();
        return view('teacher.list_assignments',compact('files'));
        }
}