<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','pagesController@index'); 
Route::get('/videos','pagesController@video');
Route::get('/image','pagesController@image');
Route::get('/CV','vacanciesController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add_employee' ,'employeeController@create');
Route::get('/add_admin' ,'adminController@create')->name('add_admin');;
Route::get('/list_employee' , 'employeeController@list');
Route::get('/list_admin' , 'adminController@list');
/** 
 * end employee routs and start teacher
 */

Route::get('/add_teacher' ,'teacherController@create');
Route::get('/list_teachers' , 'teacherController@list');
/**
 * end teacher routs and start students
 */
Route::get('/list_students' , 'activeStudentsController@index');
 /**
  * end students start videos
  */
Route::get('/add_video' , 'videoController@create');
/**
 * end video
 */
Route::get('/add_vacancy' , 'vacanciesController@create');
Route::get('/list_vacancy' , 'vacanciesController@list');


Route::post('/login/custom', [
    'uses' => 'LoginController@login',
    'as'  => 'login.custom'
]);

Route::get('/admin_home',function(){
    if(!Gate::allows('isAdmin') ){
        if(!Gate::allows('isEmployee'))
        return redirect()->back()->with('error' , 'not allowed page');
    }
    return view('admin.index');
})->name('admin.index');

Route::resource('admin','adminController');

Route::get('/user_home',function(){
    return view('user.index');
})->name('user.index');

Route::resource('employee','employeeController');
Route::resource('teacher','teacherController');
Route::resource('youTupevideo','videoController');
Route::resource('cv','cvController');
Route::resource('vacancies','vacanciesController');
Route::resource('active','activeStudentsController');
Route::resource('cards' , 'CardsController'); 
#mario work
Route::resource('assignments','filesController');
Route::resource('trialTest','trialTestController');
Route::resource('exam','examController');
Route::get('/add_assignments/{id}','filesController@create');
Route::get('/list_trial_test_questions/{id}','trialTestController@list') ;
Route::get('/trial_test/{id}','trialTestController@index');
#Route::get('/add_teacher','trialTestController@store'); 
Route::get('/homework',function(){
    return view('user.homework');
});


Route::get('/grade',function($result , $image){
        return view('exam.show_grade')->with('result' , $result)->with('image',$image);
});



Route::get('/homework/{id}','filesController@download');


Route::get('/edit_assignment/id',function(){
    return view('teacher.edit_assignment');
});
Route::get('/list_assignments/{id}','filesController@list');

//test
    //teacher
Route::get('see_test',function(){
    return view('trial_test.see_test');
}) ;

Route::get('/add_trial_test/{subject_id}','trialTestController@create') ;

Route::get('/list_trial_test/{id}','trialTestController@list_random');


#test

Route::get('add_question',function(){
    return view('test.add_question');
}) ;



//exam
    //teacher
    Route::get('/see_exam_index/{sub_id}','examController@index') ;
    Route::get('/add_exam/{sub_id}','examController@create') ;
    Route::get('/list_exam_questions/{sub_id}','examController@list_all') ;
    //student
    Route::get('/see_exam/{sub_id}','examController@list_random');
   Route::post('/calculate_exam/{num}/{sub_id}','examController@calculate');
    Route::get('/calculate_exam/{num}/{sub_id}','examController@calculate');
    Route::resource('profile','manage_account_controller');
//end of mario work