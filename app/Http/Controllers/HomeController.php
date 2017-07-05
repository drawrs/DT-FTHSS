<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Developer : Rizal Khilman
     * Facebook : http://fb.me/rizal.ofdraw
     * Instagram : http://instagram.com/rz.khilman
     * Website : http://www.khilman.com
     * Email : rizal.drawrs@gmail.com
     * Last Update: 9 Juni 2017
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
