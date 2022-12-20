<?php

namespace App\Http\Controllers;
use App\Models\Course;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function store(Request $request){

        $cr=Course::create($request->all());
        return response()->json([
            'status' => true,
            'message' => "Grade has been added  successfully!",
            'post' => $cr
        ], 200);
    }
    public function index(){
        $cr=Course::all();
        return $cr;
    }
    public function destroy($id){
        $cr=Course::find($id);
        $cr->delete();
        return response()->json([
            'status' => true,
            'message' => "Course  deleted  successfully!",
            
        ], 200);
    }
    public function update(Request $request){

        $cr= Course::find($request->id);

        $cr->update($request->all());

        return response()->json([
            'status' => true,
            'message' => "Course record Updated successfully!",
            'grade' => $cr
        ], 200);
    }
}
