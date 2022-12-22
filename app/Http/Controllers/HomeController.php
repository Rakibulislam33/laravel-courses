<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    public function index(){

        $series = Series::take(4)->get();

        $featured_courses = Course::take(6)->get();

        return view('welcome',[
            'serieses'=>$series,
            'courses'=>$featured_courses,
        ]);
    }

    public function dashboard(){

        if (Auth::user()->type===1) {

            return view('dashboard');
        }
        else{

            return redirect()->route('home');
        }
    }


    public function archive(){


    }



}
