<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // public function index(){
    //     return view('pages.index');
    // }
    // passing variables
    public function index(){
        $title = 'welcome to laravel';
        return view('pages.index', compact('title'));
    }
    // end passing variables
    public function about(){
        return view('pages.about');
    }
    // public function services(){
    //     return view('pages.services');
    // }
    // passing multiple values
    public function services(){
        $data = array(
            'title' => 'services',
            'services' => ['web design', 'programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }
    // end passing multiple values
}

