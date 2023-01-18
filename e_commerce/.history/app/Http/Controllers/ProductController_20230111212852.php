<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $data=Product::all();
        return $data;

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
    public function store(Request $request)
    {
         $res = $this->Validation($request);
        //  dd($res);
         if($res->fails()){
            return response()->json($res->errors(),202);
        }
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Product::create($input);
        
        return response()->json(['status'=>true, 'message'=>"New product added ",$input]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::find($id);
        return response()->json(['status'=>true, 'message'=>"single record ",$product]);
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
    public function update(Request $request, $id)
    {
        dd($re)
        $data = Product::find($id); 
        $data->name=$request->name;
        $data->description=$request->description;
    
        $data->quantity=$request->quantity;
        $data->price=$request->price;
        $data->category_id=$request->category_id;
       
        if ($image = $request->file('image')) {
            $destinationPath = 'images/'.$data->image;
            if (File::exists($destinationPath)) {
                File::delete($destinationPath);
            }
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['image'] = $profileImage;
        }
        $data->save();
        return response()->json(['status' => true, 'message'=>"product has been updated",$data]);
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $destinationPath = 'images/'.$product->image;
       
        if (File::exists($destinationPath)) {
            File::delete($destinationPath);
        }
        $product->delete();
        return response()->json(['status' => true,
        'message' => "product has been deleted  successfully!"]);
    }
}
