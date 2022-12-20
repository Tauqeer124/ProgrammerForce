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
            'post' => $grd
        ], 200);
    }
    public function index(){
        $grd=Grade::all();
        return $grd;
    }
    public function destroy($id){
        $grd=Grade::find($id);
        $grd->delete();
        return response()->json([
            'status' => true,
            'message' => "Grade has been deleted  successfully!",
            
        ], 200);
    }
    public function update(Request $request){

        $grd= Grade::find($request->id);

        $grd->update($request->all());

        return response()->json([
            'status' => true,
            'message' => "Grade record Updated successfully!",
            'grade' => $grd
        ], 200);
    }
}
