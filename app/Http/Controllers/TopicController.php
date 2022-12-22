<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{

    public function index($slug){

        // $topic = Topic::where('slug',$slug)->first();
        // $courses = $topic->courses()->paginate(12);
        $topic = Topic::where('slug', $slug)->first();
        $courses = $topic->courses()->latest()->paginate(12);

        // return view('topic.single',[
        //     'topic' =>$topic,
        //     'courses' =>$courses,
        // ]);
        return view('topic.single', [
            'topic' => $topic,
            'courses' => $courses
        ]);


    }
}
