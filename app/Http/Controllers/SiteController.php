<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        return view('index');
    }
    public function services(){
        $services = Service::all(); //esto hace una consulta a la base de datos
        return view('services', compact('services')); //esto envia la variable services a la vista
    }
    public function contact(){
        return view('contact');
    }
    public function about(){
        return view('about');
    }


}
