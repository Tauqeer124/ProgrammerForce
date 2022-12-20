<?php

namespace App\Http\Controllers;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function store(Request $request){
        $grd=Grade::create($request->all());
        return response()->json([
            'status' => true,
            'message' => "Student has been added  successfully!",
            'post' => $std
        ], 200);
    }
}
