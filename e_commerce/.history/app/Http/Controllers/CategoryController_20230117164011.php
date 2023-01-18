<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function __construct()
    {
        $this->middleware(['auth:api','admin'])->except(['index','show',]);
    }
    //use for validation
    public function categoryvalidation(Request $request){
        $validator = Validator::make($request->all(),[
            'cname'=>'required',
            'description'=>'required',
            'slug'=>'required',
        
        ]);
        return $validator;
    }
    //show all categories record
    public function index()
    {
        $category=Category::all();
        return $category;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //save category record 
    public function store(Request $request)
    {
        $res=$this->categoryvalidation($request);
        if($res->fails()){
            return response()->json($res->errors(),202);
        }
        $category=Category::create($request->all());
        return response()->json(['status'=>true, 'message'=>"New product added ",$category]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //show specific category
    public function show($id)
    {
        $category=Category::find($id);
        return response()->json(['status'=>true, 'message'=>"single record ",$category]);

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
    //update category record
    public function update(Request $request, $id)
    {
        $category=Category::find($id);
        $category->cname = $request->cname;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->update();
         return response()->json(['status' => 'true','message'=>"record has been Updated"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //delete 
    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        return response()->json(['status' => 'true','message'=>"record has been deleted"]);
    }
}
