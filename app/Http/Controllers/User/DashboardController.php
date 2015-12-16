<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

//Facades
use Lang;
use View;

class DashboardController extends Controller
{
    /**
     * Create a new dashboard controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the dashboard
     *
     * @param  void
     * @return object View
     */
    protected function index()
    {
        $title = Lang::get('user/dashboard.browser_title');

        return View::make('user.dashboard', compact('title'));
    }
}
