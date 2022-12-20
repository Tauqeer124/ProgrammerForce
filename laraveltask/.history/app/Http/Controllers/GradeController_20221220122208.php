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
    }
}
