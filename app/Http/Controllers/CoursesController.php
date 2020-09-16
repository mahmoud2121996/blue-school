<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $enrolledCourses = [];

        // get enrolled courses if user is student
        if (Auth::user()->is_admin == 0)
            $enrolledCourses = Auth::user()->courses()->get(); 

        return view('coursesIndex',['courses'=> Course::all(), 'enrolledCourses' => $enrolledCourses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('createCourse');
    }


    public function store(Request $request)
    {
        
        $this->validateCourse($request);

        Course::create([
            'name'=> $request['name'],
            'credit_hours'=> $request['credit_hours'],
            'description'=> $request['description'],
        ]);

        return redirect()->route('coursesIndex');
    }


    public function edit($id)
    {
        //
        $course = Course::find($id);
        
        if(isset($course))
            return view('updateCourse',['course'=>$course]);
        else
            return abort(404);
    }


    public function update(Request $request, $id)
    {

        $this->validateCourse($request);

        $course = Course::find($id);

        $course['name'] = $request['name'];
        $course['credit_hours'] = $request['credit_hours'];
        $course['description'] = $request['description'];

        $course->save();

        return redirect()->route('coursesIndex');
    }

    public function destroy($id)
    {
        //
        $course = Course::find($id);
        if(isset($course))
            $course->delete();
        return redirect()->route('coursesIndex');
    }


    private function validateCourse(Request $request){
        
        $request->validate([
            "name" => "required|max:100",
            "credit_hours" => "required|numeric|min:1",
            "description" => "required|max:500",
        ]);
    }
}
