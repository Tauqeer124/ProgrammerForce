<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $std= DB::table('students')
            ->join('courses', 'students.course_id', '=', 'courses.id')
            ->join('grades', 'students.grades_id', '=', 'grades.id')
            ->select('students.id','students.student_name','students.email', 'courses.courses', 'grades.grades')
            ->get();
        
        return $std;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $std = Student::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Student has been added  successfully!",
            'post' => $std
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
        $std=Student::find($id);
        return $std;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $std= Student::find($request->id);

        $std->update($request->all());

        return response()->json([
            'status' => true,
            'message' => "Student record Updated successfully!",
            'post' => $std
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $std=Student::find($id);
        $std->delete();
        return response(  ['message' => 'Record has been deleted', 'status' => 'true']) ; 
    }
}