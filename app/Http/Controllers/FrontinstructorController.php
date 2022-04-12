<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;


class FrontinstructorController extends Controller
{
    public function index()
    {
        $instructors = User::select('*')->where('role', 'instructor')->where('status', '1')->get();
        return view('front.instructor.index',compact('instructors'));
    }
    public function profile()
    {
        $instructors = User::select('*')->where('role', 'instructor')->where('status', '1')->first();
        $courses = Course::where('user_id', $instructors->id)->paginate(5);
        return view('front.instructor.profile',compact('instructors','courses'));
    }
}
