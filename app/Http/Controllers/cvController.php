<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cv;
class cvController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {$this->validate($request ,[
        'name' => 'required|string',
        'subject' => 'required|string' ,
        //'pdf' => 'mimes:pdf | max:1999',
        'pdf' => 'required | max:1999',
    ]);
        $cv = new cv;
        //dd($request);
        
        $pdfNameWithExt = $request->file('pdf')->getClientOriginalName();
        $pdfName = pathinfo($pdfNameWithExt , PATHINFO_FILENAME);
        $extensionpdf = $request->file('pdf')->getClientOriginalExtension();
        $pdfNameToStore = $pdfName . '_' . time() . '.' . $extensionpdf ;
        $pdfpath = $request->file('pdf')->storeAs('public/cv' , $pdfNameToStore);
        
        $cv->name = $request->input('name');
        $cv->subject = $request->input('subject');
        $cv->pdf = $pdfpath;
        $cv->save();
        return redirect()->back()->with('success' , 'pdf send');
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
