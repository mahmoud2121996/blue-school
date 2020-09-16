<?php

namespace App\Http\Controllers;

use App\Enrollment;
use Illuminate\Http\Request;

class EnrollmentsController extends Controller
{
    
    public function store(Request $request)
    {
        //
        Enrollment::create([
            'user_id' => $request['user_id'],
            'course_id' => $request['course_id'],
        ]);
        return redirect()->route('coursesIndex');
    }
 

    public function destroy(Request $request)
    {
        //
        if(isset($request['user_id']) && isset($request['course_id'])){
            $enrollment = Enrollment::whereRaw('user_id = ? and course_id = ? ', [$request['user_id'], $request['course_id']]);
            $enrollment->delete();
        }

        return redirect()->route('coursesIndex');
    }
}
