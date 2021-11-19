<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $data['cats']  =  Cat::select('id', 'name')->get();
        return view('web.home.index')->with($data);
    }
}
