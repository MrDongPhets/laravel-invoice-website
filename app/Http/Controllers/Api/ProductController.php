<?php

namespace App\Http\Controllers\Api;

use App\Models\product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index(){
        $product = product::get();
        if($product){
            return productResource::collection($product);
        }else {
            return response()->json(['message' => "no record"], 200);
        }
    }

       public function store(Request $request)
{
    // Validate the request
    $validator = Validator::make($request->all(),[
        'status' => 'required|max:191',
        'name' => 'required|max:191',
        'quantity' => 'required|max:191',
        'price' => 'required|max:191'
     
    ]);

    $product = Product::create([
        'status' => $request->status,
        'name' => $request->name,
        'quantity' => $request->quantity,
        'price' => $request->price,
 
    ]);

    if($validator->fails()){
        return response()->json([
        'status' => 422,
        'errors' => $validator->message()
    ], 422);
    }else{

        return response()->json([
            'message' => 'created',
            'data' => new ProductResource($product)
        ], 200);
        

    }
}

        public function show(product $product){
            return new productResource($product);
        }

        public function update(Request $request, Product $product){
            $validator = Validator::make($request->all(),[
                'status' => 'required|max:191',
                'name' => 'required|max:191',
                'quantity' => 'required|max:191',
                'price' => 'required|max:191',
  
             
            ]);

            $product->update([
                'status' => $request->status,
                'name' => $request->name,
                'quantity' => $request->quantity,
                'price' => $request->price,
         
            ]);

            if($validator->fails()){
                return response()->json([
                'status' => 422,
                'errors' => $validator->message()
            ], 422);
            }else{

                return response()->json([
                    'message' => 'created',
                    'data' => new productResource($product)
                ], 200);
                

            }
        }

        public function destroy(product $product){
            $product->delete();
            return response()->json([
                'message' => 'deleted',
            ], 200);
        }
}
