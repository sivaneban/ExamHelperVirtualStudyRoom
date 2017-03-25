<?php

namespace LearnLaravel\Http\Controllers;

class PagesController extends Controller
{
    public function home()
    {
    	$people = ['Siva','Niru','Mouse'];
    	return view('pages.learn3',compact('people'));	//resources/views/pages/about.blade.php
    }

    public function team()
    {
    	return view('pages.about');	//resources/views/pages/about.blade.php
    }
}
