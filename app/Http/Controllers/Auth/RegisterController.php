<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\subject;
use App\subject_user;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        /*$subjects = subject::all();
        foreach ($data->subject as $subject) {
            
        }*/
        /*
         array_push($data ,1);
        // dd($data);
        if(!array_key_exists('subject' , $data)){
            $data['0'] =0.1;
        }
        elseif (count($data['subject'])==1) {
            $data['0'] =1; 
        }
        else{
            for ($i=0; $i < count($data['subject']) -1; $i++) { 
                $sub1 = subject::find($data['subject'][$i]);
                $sub2 = subject::find($data['subject'][$i+1]);
                if($sub1->stage != $sub2->stage || $sub1->year != $sub2->year ){
                    $data['0'] =0.1 ;
                    //dd($data);
                // return FALSE ;
                }

            }
    }*/
        return Validator::make($data, [
            //'0' => 'integer',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ],[
            '0' => 'try to rgister subjects not in the same year'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = new User;
        $user->name =  $data['name'];
        $user->email = $data['email'];
        $user->password =  Hash::make($data['password']);
        $user->save();
        /*foreach ($data['subject'] as $subject) {
            $sub = new subject_user;
            $sub->user_id = $user->id;
            $sub->subject_id = $subject;
            $sub->save();
        }*/
        return ([
            //'
            'id'   => $user->id,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'updated_at' => $user->updated_at,
            'created_at' => $user->created_at,
            
        ]);
    }
}
