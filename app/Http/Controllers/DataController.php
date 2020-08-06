<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    //
    public function index(){
        return view('items.index');
    }
    public function tables(){
        return view('items.tables');
    }
}
