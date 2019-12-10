<?php

namespace App\Http\Controllers;
use App\video;
use App\Card;
use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function index(){
        $cards = Card::all();
        return view('welcome')->with('cards' , $cards);
    }
    public function video(){
        $videos = video::all();
        return view('pages.videos')->with('videos' , $videos);
    }
   
    public function image(){
        return view('pages.image');
    }
}
