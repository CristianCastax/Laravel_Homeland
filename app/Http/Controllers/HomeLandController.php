<?php

namespace App\Http\Controllers;
use App\Models\Property;
use Illuminate\Http\Request;

class HomeLandController extends Controller
{
    public function index(){
        $properties = Property::all(); //Acceder a la tabla de la base de datos

        return view('homeland.index',compact('properties'));
    }
    public function contact(){
        return view('homeland.contact');
    }
    public function about(){
        return view('homeland.about');
    }
    public function buy(){
        return view('homeland.buy');
    }
    public function rent(){
        return view('homeland.rent');
    }
}
