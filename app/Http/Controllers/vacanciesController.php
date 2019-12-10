<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vacancies;
use Gate;
class vacanciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacancies = vacancies::all();
        //return $vacancies;
        return view('pages.CV')->with('vacancies' ,$vacancies);
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
        return view('admin.add_vacancy');
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
            'discription' => 'required' 
            
        ]);
        $vacancy = new vacancies;
        $vacancy->title = $request->input('title');
        $vacancy->description = $request->input('discription');
        $vacancy->save();
        return redirect('/add_vacancy')->with('success' , 'vacancy added');
        
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
        if(!Gate::allows('isAdmin') ){
            if(!Gate::allows('isEmployee'))
            return redirect()->back()->with('error' , 'not allowed page');
        }
        $vacancy = vacancies::find($id);
        return view('admin.edit_vacancy')->with('vacancy' , $vacancy);
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
        $vacancy = vacancies::find($id);
        $this->validate($request ,[
            'title' => 'required',
            'discription' => 'required' 
            
        ]);
        $vacancy->title = $request->input('title');
        $vacancy->description = $request->input('discription');
        $vacancy->save();
        return redirect('/list_vacancy')->with('success' , 'vacancy updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacancies = vacancies::find($id);
        $vacancies->delete();
        return redirect('/list_vacancy');
    }
    public function list()
    {
        if(!Gate::allows('isAdmin') ){
            if(!Gate::allows('isEmployee'))
            return redirect()->back()->with('error' , 'not allowed page');
        }
        $vacancies = vacancies::all();
        //return $employees;
       return view('admin.list_vacancies')->with('vacancies',$vacancies);
    }
}
