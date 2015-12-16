<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

//Facades
use Auth;
use Redirect;

class WebController extends Controller
{
    /**
     * Display the Public Front Page
     *
     * @param   void
     * @return  \Illuminate\Http\Response
     */
    public function getFrontPage()
    {
        if (Auth::check())
            return Redirect::route('home');

        return view('frontpage');

    }

}
