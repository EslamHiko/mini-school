<?php

namespace MiniSchool\Http\Controllers;

use Illuminate\Http\Request;
use Youtube;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
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
    // Redirecting After Login
    public function index()
    {
        return redirect('/courses/');
    }
    // Only Users Can Access The Course
    public function course()
    {
        return view('course');
    }


}
