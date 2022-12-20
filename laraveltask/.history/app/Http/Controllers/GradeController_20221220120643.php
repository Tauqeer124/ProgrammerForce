<?php

namespace App\Http\Controllers;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function store(Request ){
        $grd=Grade::create($request->all());
    }
}
