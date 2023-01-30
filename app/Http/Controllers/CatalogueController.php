<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function catalogue()
    {
        return view('pages.bakkies.catalogue');
    }

    public function favourites()
    {
        return view('pages.bakkies.favourites');
    }

}
