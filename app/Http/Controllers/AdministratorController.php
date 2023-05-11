<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public function index(){

    }

    public function create()
    {
        return view('pages.admin.add-vehicle');
    }

    public function store()
    {

    }
}
