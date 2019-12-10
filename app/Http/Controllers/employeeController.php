<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Gate;
class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Gate::allows('isAdmin')){
            return redirect()->back()->with('error' , 'not allowed page');
        }
        return view('admin.add_employee');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $employee = new User;
        $employee->name = $request->input('name');
        $employee->user_type = 'employee';
        $employee->email = $request->input('email');
        $employee->password = bcrypt($request->input('password'));
        $employee->active = 1;
        $employee->save();
        return redirect('/add_employee')->with('success' , 'تمت اضافه الموظف');
        #return 123;
        #return add employee with success massage 
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
    
    public function list()
    {
        if(!Gate::allows('isAdmin')){
            return redirect()->back()->with('error' , 'not allowed page');
        }
        $employees = User::where('user_type' , 'employee')->get();
        //return $employees;
       return view('admin.list_employees')->with('employees',$employees);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Gate::allows('isAdmin')){
            return redirect()->back()->with('error' , 'not allowed page');
        }
        $employee = User::find($id);
        return view('admin.edit_employee')->with('employee' , $employee);
        #return list
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
        $employee = User::find($id);
        $employee->email = $request->input('email');
        if($request->input('password') != null){
            if($request->input('password-confirm') == $request->input('password')){
                $employee->password =bcrypt($request->input('password'));
                #return 12;
                #return edit emp back with his id
            }
            else {
                #return 123;
                return redirect()->back()->with('error' , 'not the same password');
            }
        }
        $employee->save();
        return redirect('/list_employee')->with('success' , 'employee updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = User::find($id);
        $employee->delete();
        return redirect('/list_employee');
    }
}
