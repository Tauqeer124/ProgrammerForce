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
    public function __construct()
    {
        $this->middleware('admin')->except(['index','show',]);
    }
    //validate request
    public function Validation(Request $request){
      
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'description'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'quantity'=>'required',
            'price'=>'required',
            'category_id'=>'required',
        ]);
        return $validator;
    }
    //show all products
    public function index()
    {
        $data=Product::with('category:id,cname')->paginate(5);
        return $data;
    }
    //search product
    public function search(){
        
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
    //save product record
    public function store(Request $request)
    {
         $res = $this->Validation($request);
            if($res->fails()){
            return response()->json($res->errors(),202);
        }
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
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
    //show specific product on bases of id
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
    //update products data
    public function update(Request $request, $id)
    {
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
    //delete product data
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
