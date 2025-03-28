<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(){
        $response = Http::get('http://localhost:3001/api/v1/employees');
        dd($response->object());
        $employees = $response->object()->data;

        return view('homeland.admin.properties.index_employees',compact('employees'));
    }
    public function employees_fetch(){
        return view('homeland.admin.properties.employees_fetch');
    }
}
